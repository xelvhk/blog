<code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /></span><span style="color: #007700">require_once&nbsp;</span><span style="color: #DD0000">'lib/common.php'</span><span style="color: #007700">;<br />require_once&nbsp;</span><span style="color: #DD0000">'lib/view-post.php'</span><span style="color: #007700">;<br /><br /></span><span style="color: #FF8000">//&nbsp;Get&nbsp;the&nbsp;post&nbsp;ID<br /></span><span style="color: #007700">if&nbsp;(isset(</span><span style="color: #0000BB">$_GET</span><span style="color: #007700">[</span><span style="color: #DD0000">'post_id'</span><span style="color: #007700">]))<br />{<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$postId&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$_GET</span><span style="color: #007700">[</span><span style="color: #DD0000">'post_id'</span><span style="color: #007700">];<br />}<br />else<br />{<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;So&nbsp;we&nbsp;always&nbsp;have&nbsp;a&nbsp;post&nbsp;ID&nbsp;var&nbsp;defined<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$postId&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">0</span><span style="color: #007700">;<br />}<br /><br /></span><span style="color: #FF8000">//&nbsp;Connect&nbsp;to&nbsp;the&nbsp;database,&nbsp;run&nbsp;a&nbsp;query,&nbsp;handle&nbsp;errors<br /></span><span style="color: #0000BB">$pdo&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">getPDO</span><span style="color: #007700">();<br /></span><span style="color: #0000BB">$row&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">getPostRow</span><span style="color: #007700">(</span><span style="color: #0000BB">$pdo</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$postId</span><span style="color: #007700">);<br /><br /></span><span style="color: #FF8000">//&nbsp;Swap&nbsp;carriage&nbsp;returns&nbsp;for&nbsp;paragraph&nbsp;breaks<br /></span><span style="color: #0000BB">$bodyText&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">htmlEscape</span><span style="color: #007700">(</span><span style="color: #0000BB">$row</span><span style="color: #007700">[</span><span style="color: #DD0000">'body'</span><span style="color: #007700">]);<br /></span><span style="color: #0000BB">$paraText&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">str_replace</span><span style="color: #007700">(</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">"&lt;/p&gt;&lt;p&gt;"</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$bodyText</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">?&gt;<br /></span>&lt;!DOCTYPE&nbsp;html&gt;<br />&lt;html&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;head&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;title&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A&nbsp;blog&nbsp;application&nbsp;|<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">htmlEscape</span><span style="color: #007700">(</span><span style="color: #0000BB">$row</span><span style="color: #007700">[</span><span style="color: #DD0000">'title'</span><span style="color: #007700">])&nbsp;</span><span style="color: #0000BB">?&gt;<br /></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/title&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;meta&nbsp;http-equiv="Content-Type"&nbsp;content="text/html;charset=utf-8"&nbsp;/&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;/head&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;body&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">require&nbsp;</span><span style="color: #DD0000">'templates/title.php'&nbsp;</span><span style="color: #0000BB">?&gt;<br /></span><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;h2&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">htmlEscape</span><span style="color: #007700">(</span><span style="color: #0000BB">$row</span><span style="color: #007700">[</span><span style="color: #DD0000">'title'</span><span style="color: #007700">])&nbsp;</span><span style="color: #0000BB">?&gt;<br /></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/h2&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">convertSqlDate</span><span style="color: #007700">(</span><span style="color: #0000BB">$row</span><span style="color: #007700">[</span><span style="color: #DD0000">'created_at'</span><span style="color: #007700">])&nbsp;</span><span style="color: #0000BB">?&gt;<br /></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #FF8000">//&nbsp;This&nbsp;is&nbsp;already&nbsp;escaped,&nbsp;so&nbsp;doesn't&nbsp;need&nbsp;further&nbsp;escaping&nbsp;</span><span style="color: #0000BB">?&gt;<br /></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$paraText&nbsp;?&gt;<br /></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/p&gt;<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;h3&gt;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">countCommentsForPost</span><span style="color: #007700">(</span><span style="color: #0000BB">$postId</span><span style="color: #007700">)&nbsp;</span><span style="color: #0000BB">?&gt;</span>&nbsp;comments&lt;/h3&gt;<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">foreach&nbsp;(</span><span style="color: #0000BB">getCommentsForPost</span><span style="color: #007700">(</span><span style="color: #0000BB">$postId</span><span style="color: #007700">)&nbsp;as&nbsp;</span><span style="color: #0000BB">$comment</span><span style="color: #007700">):&nbsp;</span><span style="color: #0000BB">?&gt;<br /></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #FF8000">//&nbsp;For&nbsp;now,&nbsp;we'll&nbsp;use&nbsp;a&nbsp;horizontal&nbsp;rule-off&nbsp;to&nbsp;split&nbsp;it&nbsp;up&nbsp;a&nbsp;bit&nbsp;</span><span style="color: #0000BB">?&gt;<br /></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;hr&nbsp;/&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="comment"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="comment-meta"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Comment&nbsp;from<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">htmlEscape</span><span style="color: #007700">(</span><span style="color: #0000BB">$comment</span><span style="color: #007700">[</span><span style="color: #DD0000">'name'</span><span style="color: #007700">])&nbsp;</span><span style="color: #0000BB">?&gt;<br /></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;on<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">convertSqlDate</span><span style="color: #007700">(</span><span style="color: #0000BB">$comment</span><span style="color: #007700">[</span><span style="color: #DD0000">'created_at'</span><span style="color: #007700">])&nbsp;</span><span style="color: #0000BB">?&gt;<br /></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="comment-body"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">htmlEscape</span><span style="color: #007700">(</span><span style="color: #0000BB">$comment</span><span style="color: #007700">[</span><span style="color: #DD0000">'text'</span><span style="color: #007700">])&nbsp;</span><span style="color: #0000BB">?&gt;<br /></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">endforeach&nbsp;</span><span style="color: #0000BB">?&gt;<br /></span>&nbsp;&nbsp;&nbsp;&nbsp;&lt;/body&gt;<br />&lt;/html&gt;<br /></span>
</code>