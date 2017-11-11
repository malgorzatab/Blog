<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->customRepositoryClassName = 'AppBundle\Repository\PostRepository';
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);
$metadata->mapField(array(
    'fieldName' => 'id',
    'type' => 'integer',
    'id' => true,
    'columnName' => 'id',
));
$metadata->mapField(array(
    'columnName' => 'title',
    'fieldName' => 'title',
    'type' => 'text',
));
$metadata->mapField(array(
    'columnName' => 'content',
    'fieldName' => 'content',
    'type' => 'text',
));
$metadata->mapField(array(
    'columnName' => 'data_posted',
    'fieldName' => 'dataPosted',
    'type' => 'date',
));

$metadata->mapField(array(
    'columnName' => 'image',
    'fieldName' => 'image',
    'type' => 'string',
));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_AUTO);