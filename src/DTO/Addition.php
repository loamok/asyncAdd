<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Addition is the DTO (Data Transform Object) that abstract entity model class for input forms
 *
 * @author symio
 */
class Addition {
    
    /**
     * @Assert\PositiveOrZero(
     *      message="The first number must be more or equal to zero."
     * )
     * @Assert\NotNull(
     *      message="The first number must not be null."
     * )
     * @Assert\Type(
     *      type="integer",
     *      message="The value {{ value }} of number A is not a valid {{ type }}."
     * )
     * @var integer
     */
    public $a = 0;
    
    /**
     * @Assert\PositiveOrZero(
     *      message="The first number must be more or equal to zero."
     * )
     * @Assert\NotNull(
     *      message="The second number must not be null."
     * )
     * @Assert\Type(
     *      type="integer",
     *      message="The value {{ value }} of number B is not a valid {{ type }}."
     * )
     * @var integer
     */
    public $b = 0;
    
}
