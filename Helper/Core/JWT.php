<?php


namespace Helper\Core;


use App\Models\User;
use Carbon\Carbon;
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
        return new Key(JWTConfig::JWT_SIGNING_KEY);
    }

    public static function resolveUserFromToken($token): User
    {
        /** @var Token $token */
        $serializedUser = $token->getClaim(JWTConfig::USER_ID);
        $serializedAcl  = $token->getClaim(JWTConfig::ACL);
        $instance       = new User();
        $acl            = unserialize($serializedAcl);
        $instance->setAcl($acl); // TODO : Do ACL
        $instance->name  = $serializedUser->name;
        $instance->id    = $serializedUser->id;
        $instance->email = $serializedUser->email;
        return $instance;
    }

    public static function sign(string $issuedBy, User $user): Token
    {
        $time    = Carbon::now();
        $nowUnix = $time->unix();
        /** @var Acl $acl */  // Todo : Do ACL
        $acl           = $user->getAcl();
        $sanitizedUser = $user->getSanitized();
        return (new Builder())->issuedBy($issuedBy) // Configures the issuer (iss claim)
                              ->identifiedBy(Strings::uuidv4(), true) // Configures the id (jti claim), replicating as a header item
                              ->issuedAt($nowUnix) // Configures the time that the token was issue (iat claim)
                              ->canOnlyBeUsedAfter($nowUnix) // Configures the time that the token can be used (nbf claim)
                              ->expiresAt($time->addSeconds(JWTConfig::JWT_TOKEN_EXPIRY_IN_SECONDS)->unix()) // Configures the expiration time of the token (exp claim)
                              ->withClaim(JWTConfig::USER_ID, $user->id) // Configures a new claim, called "uid"
                              ->withClaim(JWTConfig::USER, $sanitizedUser)
                              ->withClaim(JWTConfig::ACL, serialize($acl))
                              ->withClaim(JWTConfig::JWT_REFRESH, $time->addSeconds(JWTConfig::JWT_REFRESH_CLAIM_EXPIRY_IN_SECONDS)->unix())
                              ->getToken(self::getSigner(), self::getSigningKey()); // Retrieves the generated token
    }
}