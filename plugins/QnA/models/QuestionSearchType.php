<?php
/**
 * @copyright 2009-2020 Vanilla Forums Inc.
 * @license Proprietary
 */

namespace Vanilla\QnA\Models;

use Vanilla\Forum\Search\DiscussionSearchType;

/**
 * Search record type for a questions
 */
class QuestionSearchType extends DiscussionSearchType {

    /**
     * @inheritdoc
     */
    public function getKey(): string {
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function getType(): string {
        return 'question';
    }
}
