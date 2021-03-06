<?php

namespace Knp\DictionaryBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD"})
 */
class Dictionary extends Constraint
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var bool
     */
    public $multiple = false;

    /**
     * @var string
     */
    public $message = 'The key(s) {{ key }} doesn\'t exist in the given dictionary. {{ keys }} available.';

    /**
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return 'knp_dictionary.dictionary_validator';
    }

    /**
     * {@inheritdoc}
     */
    public function getRequiredOptions()
    {
        return ['name'];
    }
}
