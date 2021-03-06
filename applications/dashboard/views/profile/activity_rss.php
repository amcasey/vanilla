<?php if (!defined('APPLICATION')) exit(); ?>
    <description><?php echo Gdn_Format::text($this->Head->title()); ?></description>
    <atom:link href="<?php echo htmlspecialchars(url($this->SelfUrl, true)); ?>" rel="self" type="application/rss+xml"/>
<?php
$Activities = $this->data('Activities', []);
foreach ($Activities as $Activity) {
    $Author = userBuilder($Activity, 'Activity');
    ?>
    <item>
        <title><?php echo Gdn_Format::text(val('Headline', $Activity)); ?></title>
        <link><?php echo url(userUrl($Author, '', 'activity'), true); ?></link>
        <pubDate><?php echo date('r', Gdn_Format::toTimeStamp(val('DateUpdated', $Activity))); ?></pubDate>
        <dc:creator><?php echo Gdn_Format::text($Author->Name); ?></dc:creator>
        <guid
            isPermaLink="false"><?php echo val('ActivityID', $Activity).'@'.url(userUrl($Author, '', 'activity')); ?></guid>
        <?php if ($Story = val('Story', $Activity)) : ?>
            <description><![CDATA[<?php echo Gdn_Format::rssHtml($Story, val('Format', $Activity)); ?>]]>
            </description>
        <?php endif; ?>
    </item>
<?php
}
