<?php


namespace Helper\Core;


class JWTConfig
{
	public const ACL                                 = 'acl';
	public const USER                                = 'user';
	public const USER_ID                             = 'uid';
	public const JWT_REFRESH                         = 'refreshUntil';
	public const JWT_SIGNING_KEY                     = '8e876bf89484e4b0f6e99617c27a18b7'; // MD5 Encryption
	public const JWT_TOKEN_EXPIRY_IN_SECONDS         = 3600;
	public const JWT_REFRESH_CLAIM_EXPIRY_IN_SECONDS = 7200;
}