<?php
declare(strict_types=1);

namespace WoohooLabs\Yin\JsonApi\Schema\Relationship;

use WoohooLabs\Yin\JsonApi\Schema\Link\RelationshipLinks;
use WoohooLabs\Yin\JsonApi\Schema\Resource\ResourceTransformerInterface;
use WoohooLabs\Yin\JsonApi\Schema\Resource\Transformation;

class ToOneRelationship extends AbstractRelationship
{
    public function __construct(
        array $meta = [],
        ?RelationshipLinks $links = null,
        array $data = [],
        ?ResourceTransformerInterface $resourceTransformer = null
    ) {
        parent::__construct($meta, $links, $data, $resourceTransformer);
    }

    protected function transformData(
        Transformation $transformation,
        string $relationshipName,
        array $defaultRelationships
    ): ?array {
        $data = $this->retrieveData();
        if ($data === null || $this->resourceTransformer === null) {
            return null;
        }

        return $this->transformResource(
            $transformation,
            $data,
            $relationshipName,
            $defaultRelationships
        );
    }
}
