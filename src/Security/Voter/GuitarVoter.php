<?php

namespace App\Security\Voter;

use App\Entity\Guitar;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class GuitarVoter extends Voter
{
    public const EDIT = 'GUITAR_EDIT';
    public const VIEW = 'GUITAR_VIEW';
    public const DELETE = 'GUITAR_DELETE';
    public const CREATE = 'GUITAR_CREATE';
    public const BROWSE = 'GUITAR_BROWSE';

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports(string $attribute, $guitar): bool
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, [self::EDIT, self::VIEW, self::DELETE])
            && $guitar instanceof \App\Entity\Guitar;
    }

    protected function voteOnAttribute(string $attribute, $guitar, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        // check if user is admin
        if ($this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }

        // if a guitar is owned by the user, grant access
        if(null === $guitar->getUser()) {
            return false;
        }

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case self::EDIT:
                // logic to determine if the user can EDIT
                return $this->canEdit($guitar, $user);
                break;
            case self::VIEW:
                // logic to determine if the user can VIEW
                return $this->canView($guitar, $user);
                break;
            case self::DELETE:
                // logic to determine if the user can DELETE
                return $this->canDelete($guitar, $user);
                break;
            case self::CREATE:
                // logic to determine if the user can CREATE
                return $this->canCreate($guitar, $user);
                break;
            case self::BROWSE:
                // logic to determine if the user can BROWSE
                return $this->canBrowse($guitar, $user);
                break;
        }

        return false;
    }

    private function canEdit(Guitar $guitar, User $user): bool
    {
        return $user === $guitar->getUser();
    }

    private function canView(Guitar $guitar, User $user): bool
    {
        return $user === $guitar->getUser();
    }

    private function canDelete(Guitar $guitar, User $user): bool
    {
        return $user === $guitar->getUser();
    }

    private function canCreate(Guitar $guitar, User $user): bool
    {
        return $user === $guitar->getUser();
    }

    private function canBrowse(Guitar $guitar, User $user): bool
    {
        return $user === $guitar->getUser();
    }
}
