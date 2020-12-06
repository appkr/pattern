<?php

namespace Behavioral\State;

class AtmException extends \Exception
{
    public static function incorrectPin()
    {
        return new static('비밀번호가 일치하지 않습니다.');
    }

    public static function insufficientBalance()
    {
        return new static('지급 가능한 잔액이 부족합니다.');
    }

    public static function cardNotProvided()
    {
        return new static('카드가 삽입되지 않았습니다.');
    }

    public static function cardAlreadyProvided()
    {
        return new static('카드가 이미 삽입되어있습니다.');
    }

    public static function pinNotProvided()
    {
        return new static('비밀번호를 입력해 주세요.');
    }

    public static function pinAlreadyProvided()
    {
        return new static('비밀번호가 이미 입력되었습니다.');
    }

    public static function illegalAccess()
    {
        return new static('사용할 수 없는 동작입니다.');
    }
}