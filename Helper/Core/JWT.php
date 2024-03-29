<?php


namespace Helper\Core;


use App\Models\User;
use Carbon\Carbon;
use Helper\ACL\Acl;
use Helper\Config\JWTConfig;
use Helper\Constants\JWTTokenStatus;
use Helper\Transform\Strings;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Hmac;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key;
use Lcobucci\JWT\Token;

class JWT
{
    private static Hmac $signer;

    public static function validate(string $token): array
    {
        $parsed = (new Parser())->parse($token);
        $status = JWTTokenStatus::INVALID;
        if ($parsed->verify(self::getSigner(), self::getSigningKey())) {
            $status = $parsed->isExpired() ? JWTTokenStatus::EXPIRED : JWTTokenStatus::OK;
        }
        return [$status, $parsed];
    }

    private static function getSigner(): Hmac
    {
        if (isset(self::$signer)) {
            return self::$signer;
        }
        self::$signer = new Sha256();
        return self::$signer;
    }

    private static function getSigningKey(): Key
    {
        return new Key(JWTConfig::$signingKey);
    }

    public static function resolveUserFromToken($token): User
    {
        /** @var Token $token */
        $serializedUser       = $token->getClaim(JWTConfig::$user);
        $serializedAcl        = $token->getClaim(JWTConfig::$acl);
        $instance             = new User();
        $acl                  = unserialize($serializedAcl);
        $instance->acl        = $acl;
        $instance->name       = $serializedUser->name;
        $instance->id         = $serializedUser->id;
        $instance->email      = $serializedUser->email;
        $instance->project_id = $serializedUser->project_id;
        return $instance;
    }

    /**
     * @param  string  $issuedBy
     * @param  User  $user
     * @return Token
     */
    public static function sign(string $issuedBy, User $user): Token
    {
        $time          = Carbon::now();
        $nowUnix       = $time->unix();
        $acl           = Acl::decodeRole($user->acl);
        $sanitizedUser = $user->getSanitized();
        return (new Builder())->issuedBy($issuedBy)
                              ->identifiedBy(Strings::uuidv4(), true)
                              ->issuedAt($nowUnix)
                              ->canOnlyBeUsedAfter($nowUnix)
                              ->expiresAt($time->addSeconds(JWTConfig::$idTokenExpiryInSeconds)->unix())
                              ->withClaim(JWTConfig::$userId, $user->id)
                              ->withClaim(JWTConfig::$user, $sanitizedUser)
                              ->withClaim(JWTConfig::$acl, serialize($acl))
                              ->withClaim(JWTConfig::$refresh, $time->addSeconds(JWTConfig::$refreshTokenExpiryInSeconds)->unix())
                              ->getToken(self::getSigner(), self::getSigningKey());
    }
}