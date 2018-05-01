/**
 * @author Adam (charrondev) Charron <adam.c@vanillaforums.com>
 * @copyright 2009-2018 Vanilla Forums Inc.
 * @license https://opensource.org/licenses/GPL-2.0 GPL-2.0
 */

import React from "react";
import classNames from "classnames";
import { withEditor, IEditorContextProps } from "./ContextProvider";
import MentionBlot from "../Quill/Blots/Embeds/MentionBlot";
import MentionSuggestion, { IMentionData, MentionSuggestionNotFound } from "./MentionSuggestion";

interface IProps extends IEditorContextProps {
    mentionData: IMentionData[];
    matchedString: string;
    id: string;
    activeItemId: string | null;
    onItemClick: React.MouseEventHandler<any>;
    style?: React.CSSProperties;
}

export default function MentionList(props: IProps) {
    const { activeItemId, style, id, onItemClick, matchedString, mentionData } = props;

    const hasResults = mentionData.length > 0;
    const classes = classNames("atMentionList-items", "MenuItems");

    return (
        <span style={style} className="atMentionList">
            <ul id={id} aria-label="{t('@mention user list')}" className={classes} role="listbox">
                {hasResults ? (
                    mentionData.map(mentionItem => {
                        const isActive = mentionItem.uniqueID === activeItemId;
                        return (
                            <MentionSuggestion
                                {...mentionItem}
                                key={mentionItem.name}
                                onClick={onItemClick}
                                isActive={isActive}
                                matchedString={matchedString}
                            />
                        );
                    })
                ) : (
                    <MentionSuggestionNotFound />
                )}
            </ul>
        </span>
    );
}
