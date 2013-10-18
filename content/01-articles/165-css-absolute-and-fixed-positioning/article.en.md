Title: CSS absolute and fixed positioning
----
Date: 2008-09-26 06:38:13
----
Lang: en
----
Author: 
----
License: Creative Commons Attribution, Non Commercial - Share Alike 2.5
----
License_url: http://creativecommons.org/licenses/by-nc-sa/2.5/
----
Text:

<div class="note">
<h2 style="color:red;font-weight:bold;padding-top:0;margin-top:0;">11th October 2012: Material moved to <a href="http://www.webplatform.org">webplatform.org</a></h2>

<p style="padding-bottom: 20px;">The Opera web standards curriculum has now been moved to the <a href="http://docs.webplatform.org/wiki/Main_Page">docs section of the W3C webplatform.org site</a>. Go there to find updated versions of these docs, and much more besides!</p>

<h2 style="color:red;font-weight:bold;padding-top:0;margin-top:0;">12th April 2012: This article is obsolete</h2>

<p>The web standards curriculum has been donated to the <a href="http://www.w3.org/community/webed/">W3C web education community group</a>, to become part of a much bigger educational resource. It is constantly being updated so that it remains current with modern web design practices and technologies. To find the most up-to-date web standards curriculum, visit the <a href="http://www.w3.org/community/webed/wiki/Main_Page">web education community group Wiki</a>. Please make changes to this Wiki yourself, or suggest changes to <a href="mailto:cmills@opera.com">Chris Mills</a>, who is also the chair of the web education community group.</p>
</div>

<ul class="seriesNav">	
<li class="prev"><a href="http://dev.opera.com/articles/view/36-css-static-and-relative-positioning/" rev="prev" title="link to the previous article in the series">Previous article—CSS static and relative positioning</a></li>
<li class="next"><a href="http://dev.opera.com/articles/view/38-headers-footers-columns-templates/" rev="next" title="link to the next article in the series">Next article—Headers, footers, columns, and templates</a></li>
<li><a href="http://dev.opera.com/articles/view/1-introduction-to-the-web-standards-cur/#toc" rel="index">Table of contents</a></li>
</ul>
		<h2>Introduction</h2>

		<p>Now it’s time to turn your attention to the second pair of <code>position</code> property values—<code>absolute</code> and <code>fixed</code>.
		The first pair of values—<code>static</code> and <code>relative</code>—are closely related, and we looked into those in great detail in
		<a href="http://dev.opera.com/articles/view/36-css-static-and-relative-positioning/">the last article</a>.</p>

		<p>Absolutely positioned elements are removed entirely from the document flow.
		That means they have no effect at all on their parent element or on the elements that occur after them in the source code.
		An absolutely positioned element will therefore overlap other content unless you take action to prevent it.
		Sometimes, of course, this overlap is exactly what you desire, but you should be aware of it, to make sure you are getting the layout you want!</p>
		
		<p>Fixed positioning is really just a specialized form of absolute positioning; elements with fixed positioning are fixed relative to the viewport/browser window rather than the containing element; even if the page is scrolled, they stay in exactly the same position inside the browser window.</p>
		
		<p>In this article I’ll give you some practical examples of using both <code>absolute</code> and <code>fixed</code> positioning, look at some browser support quirks, and explore the concept of z-index.</p> 
		
		<p>The article structure is as follows:</p>
		
		<ul>
  <li><a href="#containingblocks">Containing blocks</a></li>
  <li><a href="#absolutepositioning">Absolute positioning</a>
    <ul>
      <li><a href="#specifyingposition">Specifying the position</a></li>
      <li><a href="#specifyingdimensions">Specifying dimensions</a></li>
      <li><a href="#zindex">The third dimension—z-index</a>
        <ul>
          <li><a href="#localstackingcontexts">Local stacking contexts</a></li>
        </ul>
      </li>
    </ul>
  </li>
  <li><a href="#fixedpositioning">Fixed positioning</a></li>
  <li><a href="#summary">Summary</a></li>
  <li><a href="#exercises">Exercise questions</a></li>
</ul>
		
		
		<p>Before I talk about all this though, I’ll cover an essential prequisite concept—containing blocks.</p>

		<h2 id="containingblocks">Containing blocks</h2>
		
		<p>An essential concept when it comes to absolute positioning is the <dfn>containing block</dfn>:
		the block box that the position and dimensions of the absolutely positioned box are relative to.</p>

		<p>For static boxes and relatively positioned boxes the containing block is the nearest block-level ancestor—the parent element in other words. For absolutely positioned elements however it’s a little more complicated.
		In this case the containing block is the nearest <em>positioned</em> ancestor. By “positioned” I mean an element whose <code>position</code> property is set to <code>relative</code>, <code>absolute</code> or <code>fixed</code>—in other words, anything except normal static elements.</p>

		<p>So, by setting <code>position:relative</code>  for an element you make it the containing block for any absolutely positioned descendant (child elements), whether they appear immediately below the relatively positioned element in the hierarchy, or further down the hierarchy.</p>

		<p>If an absolutely positioned element has no positioned ancestor, then the containing block is something called the “initial containing block,” which in practice equates to the <code>html</code> element. If you are looking at the web page on screen, this means the browser window; if you are printing the page, it means the page boundary.</p>

		<p>Elements with fixed positioning differ from this slightly—they <em>always</em> have the initial containing block as their containing block.</p>

		<p>So, let’s summarize this in a set of easy steps—to find the containing block for an element with <code>position:absolute</code> , this is what you need to do:</p>
		<ol>
			<li>Look at the parent element of the absolutely positioned element—does that element’s <code>position</code> property have one of the values <code>relative</code>, <code>absolute</code> or <code>fixed</code>?</li>
			<li>If so, you’ve found the containing block.</li>
			<li>If not, move to the parent’s parent element and repeat from step 1 until you find the containing block or run out of ancestors.</li>
			<li>If you’ve reached the <code>html</code> element without finding a positioned ancestor, then the containing block is the <code>html</code> element.</li>
		</ol>

		<h2 id="absolutepositioning">Absolute positioning</h2>
		
		<p>Fixed positioning is a special form of absolute positioning, so we’ll study that later, and concentrate on the more generalized case here.
		Unless otherwise stated, when I use the term “absolutely positioned” from now until the end of the article, I’ll be referring both to elements with <code>position:fixed</code>  <em>and</em> elements with <code>position:absolute</code> .</p>

		<h3 id="specifyingposition">Specifying the position</h3>
		
		<p>With relative positioning, you learned that the <code>top</code>, <code>right</code>, <code>bottom</code> and <code>left</code> properties could be used to specify the position of the box.
		You use the same properties to specify the position of an absolutely positioned box, but the way you use them is quite different.</p>

		<p>For a relatively positioned element, the four properties specify the relative distance to shift the generated box.
		Remember that in the case of relative positioning they complement one another, so that <code>top:1em</code> and <code>bottom:-1em</code> means the same,
		and it’s not meaningful to specify both <code>top</code> and <code>bottom</code> (or <code>left</code> and <code>right</code>) for the same element, because one of the
		values will be ignored.</p>

		<p>These points are not true in the case of absolute positioning.
		Here, all four properties can be used at the same time, to specify the distance from each edge of the positioned element to the corresponding edge of the containing block.
		You can also specify the position of one of the corners of the absolutely positioned box—say by using <code>top</code> and <code>left</code>—and then specify the dimensions of the box using <code>width</code> and <code>height</code> (or just use no <code>width</code> and <code>height</code> if you want to let it shrink-wrap to fit its contents).</p>

		<p>Microsoft Internet Explorer version 6 and older don’t support the method of specifying all four edges, but they do support the method of specifying one corner
		plus the dimensions.</p>

<pre><code>/* This method works in IE6 */
#foo {
  position: absolute;
  top: 3em;
  left: 0;
  width: 30em;
  height: 20em;
}

/* This method doesn&#39;t work in IE6 */
#foo {
  position: absolute;
  top: 3em;
  right: 0;
  bottom: 3em;
  left: 0;
}</code></pre>

		<p>The thing to remember here is that the values you set for the <code>top</code>, <code>right</code>, <code>bottom</code> and <code>left</code> properties
		specify the distances from the element’s edges to their <em>corresponding</em> containing block edges.
		It’s not like in a co-ordinate system where each value is relative to one point of origin.
		For instance, <code>right:2em</code> means that the right edge of the absolutely positioned box will be 2em from the right edge of the containing block.</p>

		<p>It’s absolutely crucial to know what your containing block is when you’re using absolute positioning.
		That’s why setting <code>position:relative</code>  on your containing block is so useful, even if you are not actually shifting the position of the box. It allows you to make an element the containing block for its absolutely positioned descendants—it gives you control.</p>

		<p>Let’s try an example out to see how it works.</p>

		<ol>
			<li><p>Copy the code below into your text editor and save the document as <kbd>absolute.html</kbd>.</p>
			
<pre><code>&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.01//EN&quot; &quot;http://www.w3.org/TR/html4/strict.dtd&quot;&gt;
&lt;html&gt;
  &lt;head&gt;
    &lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot;&gt;
    &lt;title&gt;Absolute Positioning&lt;/title&gt;
    &lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;absolute.css&quot;&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;div id=&quot;outer&quot;&gt;
      &lt;div id=&quot;inner&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre></li>

			<li><p>Next, copy the following code into a new file and save it as <kbd>absolute.css</kbd>.</p>
			
<pre><code>html, body {
  margin: 0;
  padding: 0;
}

#outer {
  margin: 5em;
  border: 1px solid #f00;
}

#inner {
  width: 6em;
  height: 4em;
  background-color: #999;
}</code></pre></li>

			<li><p>Save both files and load the <abbr>HTML</abbr> document into your browser.
			You will see a grey rectangle surrounded by a somewhat wider red border.
			The <code>#inner</code> element has a specified width and height and a grey background colour.
			The <code>#outer</code> element, which is the structural parent of <code>#inner</code>, has a red border.
			It also has a 5em margin all around, to shift it away from the edges of the browser window and let us see more clearly what is going on.</p>

			<p>Nothing surprising so far, right?
			The height of the <code>#outer</code> element is given by its child element (<code>#inner</code>) and the width by the horizontal margins.</p></li>

			<li><p>Now watch what happens if you make <code>#inner</code> absolutely positioned!
			Add the following highlighted declaration to the <code>#inner</code> rule:</p>
			
<pre><code>#inner {
  width: 6em;
  height: 4em;
  background-color: #999;
  <strong>position: absolute;</strong>
}</code></pre></li>

			<li><p>Save and reload.
			Instead of a red border around the grey rectangle, there is now what looks like a thicker top border only.
			And the grey box didn’t move at all! Did you expect that?</p>

			<p>There are two interesting things happening here.
			First of all, making <code>#inner</code> absolutely positioned removed it entirely from the document flow.
			That means its parent, <code>#outer</code>, now has no children that are in the normal flow, so therefore its height collapses to zero.
			What looks like a 2px-thick red line is actually a 1px border around an element with zero height—you’re seeing the top and bottom borders with nothing inbetween.</p>

			<p>The second interesting thing is that the absolutely positioned box didn’t move.
			The default value for the <code>top</code>, <code>right</code>, <code>bottom</code> and <code>left</code> properties is <code>auto</code>,
			which means the absolutely positioned box will appear exactly where it would have had if it wasn’t positioned.
			Since it’s removed from the flow it will overlap any elements in the normal flow that follow it, though.</p>

			<p>This is actually very useful—you can rely on this if you only want to move a generated box in one dimension.
			For instance, in a <abbr>CSS</abbr>-driven drop-down menu, the “drop-down” panes can be absolutely positioned with only the <code>top</code> property specified.
			They will then appear at the expected co-ordinate along the X axis (the same as their parent), automatically.</p></li>

			<li><p>Next, let’s set a height for the <code>#outer</code> element so that it looks like a rectangle again, and move <code>#inner</code> sideways. Add the following highlighted lines to your <abbr>CSS</abbr> rules:</p>
			
<pre><code>#outer {
  margin: 5em;
  border: 1px solid #f00;
  <strong>height: 4em;</strong>
}

#inner {
  width: 6em;
  height: 4em;
  background-color: #999;
  position: absolute;
  <strong>left: 1em;</strong>
}</code></pre></li>

			<li><p>Save and reload, and you’ll see some changes.
			The <code>#outer</code> element is now a rectangle again, since you set a height for it. The <code>#inner</code> element has shifted sideways, but not to where you might have expected it to go. It’s not 1em from the left border of its parent, but 1em from the left edge of the window!</p>

			<p>The reason is that, as explained above, <code>#inner</code> has no positioned ancestor, so its containing block is the initial containing block.
			If you specify a position other than <code>auto</code>, it’s relative to the corresponding edge of the containing block.
			When you set <code>left:1em</code>, the left edge of <code>#inner</code> ended up 1em from the left edge of the window.</p></li>

			<li><p>If you want it 1em from the left edge of its parent element instead, you must make the parent the containing block.
			To do this, you’ll now use the trick I mentioned earlier in this article—making the parent block relatively positioned. Add the following highlighted line to the <code>#outer</code> rule:</p>
			
<pre><code>#outer {
  margin: 5em;
  border: 1px solid #f00;
  height: 4em;
  <strong>position: relative;</strong>
}</code></pre></li>

			<li><p>Save and reload—lo and behold! The grey rectangle is now 1em from the left border of the parent element.
			Setting <code>position:relative</code>  on the <code>#outer</code> rule has made it positioned and set it as the containing block for any absolutely positioned descendants it might have.
			The <code>left:1em</code> you set for <code>#inner</code> now counts from the left edge of <code>#outer</code>, not the left edge of the browser window.</p></li>
		</ol>

		<h3 id="specifyingdimensions">Specifying dimensions</h3>
		
		<p>Absolutely positioned elements will shrink-wrap to fit their contents unless you specify their dimensions. You can specify the width by setting the <code>left</code> and <code>right</code> properties, or by setting the <code>width</code> property. You can specify the height by setting the <code>top</code> and <code>bottom</code> properties, or by setting the <code>height</code> property.</p>

		<p>Any of these six properties can be specified as a percentage.
		Percentages are, by their very nature, relative to something else.
		In this case they are relative to the dimensions of the containing block.</p>

		<p>For an absolutely positioned element, percentage values for the <code>left</code>, <code>right</code> and <code>width</code> properties are relative to the width of the containing block. Percentage values for the <code>top</code>, <code>bottom</code> and <code>height</code> properties are relative to the height of the containing block.</p>

		<p>Internet Explorer 6 and older, and also Opera 8 and older, got this entirely wrong and used the dimensions of the <em>parent</em> block instead. Let’s experiment with another example to see how that can make a big difference.</p>

		<ol>
			<li><p>Begin by specifying the dimensions of <code>#inner</code> using percentage values—make the following changes to the <code>#inner</code> rule:</p>
			
<pre><code>#inner {
  <strong>width: 50%;</strong>
  <strong>height: 50%;</strong>
  background-color: #999;
  position: absolute;
  left: 1em;
}</code></pre></li>

			<li><p>Save and reload, and you’ll see that the grey rectangle becomes wider and shorter (at least if you’re using a modern browser).The containing block is still <code>#outer</code>, since it has <code>position:relative</code> .
			The <code>#inner</code> element’s width is now half that of <code>#outer</code>, and its height is half the height of <code>#outer</code>.</p></li>

			<li><p>Let’s make the viewport the containing block again, to see the difference! Make the following change to <code>#outer</code>:</p>
			
<pre><code>#outer {
  margin: 5em;
  border: 1px solid #f00;
  height: 4em;
  <strong>position: static;</strong>
}</code></pre></li>

			<li><p>Save and reload—quite a difference, eh?
			The grey box is now half as wide and half as tall as the browser window.</p></li>
		</ol>

		<p>As you can see, knowing your containing blocks is absolutely essential!</p>

		<h3 id="zindex">The third dimension—z-index</h3>
		
		<p>It’s natural to regard a web page as two-dimensional.
		Technology hasn’t evolved far enough that 3D displays are commonplace, so we have to be content with width and height and fake 3D effects.
		But <abbr>CSS</abbr> rendering actually happens in three dimensions!
		That doesn’t mean you can make an element hover in front of the monitor—yet—but you can do some other useful things with positioned elements.</p>

		<p>The two main axes in a web page are the horizontal X axis and the vertical Y axis.
		The origin of this co-ordinate system is in the upper left-hand corner of the viewport, ie where both the X and Y values are 0.</p>

		<p>But there is also a Z axis, which we can imagine as running perpendicular to the monitor’s surface (or to the paper, when printing).
		Higher Z values indicate a position “in front of” lower Z values.
		Z values can also be negative, which indicate a position “behind” some point of reference (I’ll explain this point of reference in a minute).</p>

		<p class="note">Before we continue, I should warn you that this is one of the most complicated topics within CSS, so don’t get disheartened if you don&#39;t understand it on your first read.</p>

		<p>Positioned elements (including relatively positioned elements) are rendered within something known as a <dfn>stacking context</dfn>.
		Elements within a stacking context have the same point of reference along the Z axis. I’ll explain more about this below.
		You can change the Z position (also called the <dfn>stack level</dfn>) of a positioned element using the <code>z-index</code> property.
		The value can be an integer number (which may be negative) or one of the keywords <code>auto</code> or <code>inherit</code>.
		The default value is <code>auto</code>, which means the element has the same stack level as its parent.</p>

		<p>You should note that you can only specify an <em>index</em> position along the Z axis.
		You can’t make one element appear 19 pixels behind or 5 centimetres in front of another.
		Think of it like a deck of cards: you can stack the cards and decide that the ace of spades should be on top of the three of diamonds—each card has its stack level,
		or Z index.</p>

		<p>If you specify the <code>z-index</code> as a positive integer, you assign it a stack level “in front of” other elements within the same stacking context that have a lower stack level.
		A <code>z-index</code> of 0 (zero) means the same as <code>auto</code>, but there is a difference to which I will come back in a minute.
		A negative integer value for <code>z-index</code> assigns a stack level “behind” the parent’s stack level.</p>

		<p>When two elements in the same stacking context have the same stack level, the one that occurs later in the source code will appear on top of its preceding siblings.</p>

		<p>There can in fact be no less than seven layers in one stacking context, and any number of elements in those layers, but don&#39;t worry—you are unlikely to have to deal with seven layers in a stacking context. The order in which the elements (all elements, not only the positioned ones) within one stacking context are rendered, from back to front is as follows:</p>

		<ol>
			<li>The background and borders of the elements that form the stacking context</li>
			<li><strong>Positioned descendants with negative stack levels</strong></li>
			<li>Block-level descendants in the normal flow</li>
			<li>Floated descendants</li>
			<li>Inline-level descendants in the normal flow</li>
			<li><strong>Positioned descendants with the stack level set as <code>auto</code> or <code>0</code> (zero)</strong></li>
			<li><strong>Positioned descendants with positive stack levels</strong></li>
		</ol>

		<p>The highlighted entries are the elements whose stack level we can change using the <code>z-index</code> property.</p>

		<p>This whole thing can be rather difficult to imagine, so let’s do some practical experiments to illustrate Z-index.</p>

		<ol>
			<li><p>Begin by adding the following highlighted line to your little sample document:</p>
			
<pre><code>&lt;body&gt;
  &lt;div id=&quot;outer&quot;&gt;
    &lt;div id=&quot;inner&quot;&gt;&lt;/div&gt;
    <strong>&lt;div id=&quot;second&quot;&gt;&lt;/div&gt;</strong>
  &lt;/div&gt;
&lt;/body&gt;</code></pre></li>

			<li><p>Next, I’ll get you to restore your <abbr>CSS</abbr> so that <code>#outer</code> is the containing block and set non-percentage dimensions of <code>#inner</code>. Let’s make <code>#outer</code> a little taller, too, to give you more room to experiment. Make the following highlighted changes to the two rules:</p>
			
<pre><code>#outer {
  margin: 5em;
  border: 1px solid #f00;
  <strong>height: 8em;</strong>
  <strong>position: relative;</strong>
}

#inner {
  <strong>width: 5em;</strong>
  <strong>height: 5em;</strong>
  background-color: #999;
  position: absolute;
  left: 1em;
}</code></pre></li>

<li><p>Add a rule for the <code>#second</code> element, too:</p>

<pre><code>#second {
  width: 5em;
  height: 5em;
  background-color: #00f;
  position: absolute;
  top: 1em;
  left: 2em;
}</code></pre></li>

			<li><p>Save and reload, and you’ll see a bright blue box overlapping a grey one.
			Both boxes have the same stack level (<code>auto</code>, the initial value, which means stack level 0) but the blue box is rendered in front of the grey box, because it appears later in the source code.
			You can make the grey box appear in front by giving it a positive stack level.
			You only have to set it larger than 0—there’s no need to go overboard and use a value like 10000. Add the following highlighted line to the <code>#inner</code> rule:</p>
			
<pre><code>#inner {
  width: 5em;
  height: 5em;
  background-color: #999;
  position: absolute;
  left: 1em;
  <strong>z-index: 1;</strong>
}</code></pre></li>

			<li><p>Save and reload, and you will now see the grey box appear in front of the blue box.</p></li>
		</ol>

		<h4 id="localstackingcontexts">Local stacking contexts</h4>
		
		<p>The rest of this section discusses local stacking contexts.
		This probably isn’t something you will encounter in your normal design work unless you attempt to do some really advanced things with absolute positioning, but I thought I’d include it for completeness. You can elect to skip this if you wish.</p>

		<p>Every element whose <code>z-index</code> is specified as an integer establishes a new, “local”, stacking context in which the element itself has stack level 0.
		This is the difference I mentioned before between <code>z-index: auto</code> and <code>z-index: 0</code>.
		The former doesn’t establish a new stacking context, but the latter does.</p>

		<p>When an element establishes a local stacking context, the stack levels of its positioned descendants apply within this local context only.
		These descendants can be re-stacked with respect to one another, and with respect to their parent, but not with respect to the parent’s siblings.
		It’s like the parent forms a “cage” around its descendants, so that they cannot escape from it.
		The descendants may be moved up and down within this cage, but they can’t get out of the cage.
		The parent and its descendants will form an indivisible unit within the stacking context that surrounds the parent.</p>

		<p>Imagine you’re sorting out your paperwork before delivering it to the accountant who does your taxes.
		You have expense reports, receipts, order confirmations and whatnot, and you stack one paper on top of another—to make life easier for you accountant, you insert types of papers that belong together in different envelopes.</p>

		<p>A local stacking context is analogous to such an envelope.
		It keeps related elements together and prevents other elements from being inserted between them.
		You can sort the contents within each envelope as you like, but that sort order only applies within that envelope and has no bearing on the stack of papers as a whole.
		Your stack now contains a mix of loose papers (elements with stack level <code>auto</code>), and envelopes (elements with an integer stack level).
		Envelopes with positive stack levels lie on top of the loose papers, while envelopes with negative stack levels appear at the bottom of the pile.</p>

		<p>Each time you assign an integer value to the <code>z-index</code> property for an element, you create an “envelope” that contains that element and its descendants.</p>

		<p>Let’s look at how those local stacking contexts work.
		It may look confusing, but it’s really not much different from what you’ve already seen. If you follow the examples, you should be able to get a feel for how things work.</p>

		<ol>
			<li><p>Begin by adding some content to your two inner elements—add the highlighted lines to your <abbr>HTML</abbr> document:</p>
			
<pre><code>&lt;div id=&quot;inner&quot;&gt;
  <strong>&lt;span&gt;&lt;/span&gt;</strong>
&lt;/div&gt;
&lt;div id=&quot;second&quot;&gt;
  <strong>&lt;span&gt;&lt;/span&gt;</strong>
&lt;/div&gt;</code></pre></li>

			<li><p>Add a <abbr title="Cascading Style Sheets">CSS</abbr> rule that will apply to both those <code>span</code> elements:</p>
			
<pre><code>span {
  position: absolute;
  top: 2em;
  left: 2em;
  width: 3em;
  height: 3em;
}</code></pre>

			<p>This makes the <code>span</code> elements absolutely positioned and sets their positions and dimensions. Wait a second though—<code>span</code> elements are inline—how can you specify dimensions for inline elements? The answer is that absolutely positioned elements, like floated elements, automatically generate block boxes.</p>

			<p>The positions you specify will apply relative to each <code>span</code>’s containing block. Since both <code>span</code> elements have an absolutely positioned <code>div</code> as a parent, those parents take on the role of containing blocks.</p></li>

			<li><p>Let’s now add some colour to the <code>span</code> elements so you can see where they appear’add the following rules to your style sheet:</p>
			
<pre><code>#inner span {
  background-color: #ff0;
}

#second span {
  background-color: #0ff;
} </code></pre></li>

			<li><p>Save and reload, and you should see a yellow square in the bottom right-hand corner of the larger grey square, and a cyan-coloured square in the bottom right-hand corner of the larger blue square. The grey and yellow squares appear in front of the blue and cyan squares, since the grey square has <code>z-index:1</code> .</p></li>

			<li><p>What if you want the cyan square in front of all the other squares? All you need to do is to give it a higher stack level than the grey square. Actually, it’s enough to give it the <em>same</em> stack level as the grey square, since the cyan square appears later in the markup. Let’s try that—make the following change to your <abbr title="Cascading Style Sheets">CSS</abbr>:</p>
			
<pre><code>#second span {
  background-color: #0ff;
  <strong>z-index: 1;</strong>
} </code></pre></li>

			<li><p>Save and reload. If your browser supports the <abbr>CSS</abbr> recommendation properly, the cyan square should now be at the front.</p>

			<p>The grey square has <code>z-index:1</code> , which means it establishes a local stacking context. In other words, you’ve created one of those “envelopes” and put the grey square and its yellow child square inside.</p></li>
		</ol>

		<p>Confused yet? The next experiment should make things clearer.</p>

		<ol>
			<li><p>Set a high stack level for the yellow square to bring it to the front—make the following change to your <abbr>CSS</abbr>:</p>
			
<pre><code>#inner span {
  background-color: #ff0;
  <strong>z-index: 4;</strong>
}</code></pre></li>

			<li><p>If you save and reload you’ll see…no change at all! The stack level we specified for the yellow square applies within the local stacking context established by the grey square—the yellow square is inside an envelope together with its grey parent. You could move the cyan square to the front because its parent (the blue square) doesn’t establish a local stacking context—it has an implied <code>z-index:auto</code> . The blue square is a loose paper in the stack. The yellow and cyan squares area actually in little envelopes all by themselves (they have an integer stack level and establish local stacking contexts of their own).</p></li>

<li><p>If you make the blue square establish a local stacking context, you won’t be able to move the cyan square to the front unless you also bring its parent (the blue square) to the front. Let’s try it—make the following changes to your <abbr>CSS</abbr>:</p>
			
<pre><code>#inner {
  
  ...
  
  <strong>z-index: 2;</strong>
}

#second {
  
  ...
  
  <strong>z-index: 1;</strong>
}

#second span {
  
  ...
  
  <strong>z-index: 3;</strong>
}</code></pre></li>

			<li><p>Save and reload. Now both the grey square and the blue square establish local stacking contexts, giving us two envelopes. At the bottom of the stack is an envelope with stack level 1, containing two inner envelopes (the blue square and the cyan square). At the top of the stack is an envelope with stack level 2, containing two inner envelopes (the grey square and the yellow square). In the first envelope, the blue square has local stack level 0 so therefore appears behind the cyan square, which has local stack level 3. In the second envelope, the grey square has local stack level 0 so therefore appears behind the yellow square with local stack level 4.</p>

<p>Figure 1 shows the four boxes and the two local stacking contexts from the side, along the Z axis.</p>

<p><img src="http://forum-test.oslo.osa/kirby/content/articles/165-37-css-absolute-and-fixed-positioning/stacking-contexts.png" alt="The blue box is at the bottom, followed by the cyan, grey and yellow boxes" /></p>

<p class="comment">Figure 1: Illustration of different stacking contexts. The elements appearing inside &quot;2&quot; will always appear in front of all of the elements inside &quot;1&quot;. Then within each stacking context, elements with a higher z-index number appear in front of elements with a small z-index number. If two elements have the same z-index number, the one appearing later in the markup will appear in front.</p></li>
		</ol>

		<p>This part was probably quite confusing, especially if you’re new to CSS.
		The point is that you need to know your stacking contexts if you’re trying to change the stack levels of different elements.
		If an element belongs to a local stacking context you can only change its position along the Z axis within that local context.
		An element in one local stacking context cannot slide in between two elements in another local stacking context.</p>

		<p>The good news is that you’ll most likely never encounter these problems. Changes in <code>z-index</code> are not very common in good layouts, and if they occur at all it is usually within one stacking context.</p>

		<h2 id="fixedpositioning">Fixed positioning</h2>
		
		<p>An element with <code>position:fixed</code>  is fixed with respect to the viewport.
		It stays where it is, even if the document is scrolled.
		For <code>media=&quot;print&quot;</code> a fixed element will be repeated on each printed page.</p>

		<p>Note that Internet Explorer versions 6 and older do not support fixed positioning at all.
		If you use one of those browsers you will not be able to see the results of the examples in this section.</p>

		<p>Whereas the position and dimensions of an element with <code>position:absolute</code>  are r
      elative to its containing block,
		the position and dimensions of an element with <code>position:fixed</code>  are always relative to the initial containing block.
		This is normally the viewport: the browser window or the paper’s page box.</p>

		<p>To demonstrate this, in the example below you will make one of your elements fixed.
		You will make the other one very tall in order to cause a scrollbar, to mke it easier to see the effect it has.</p>

		<ol>
			<li><p>Make the following changes to your <abbr>CSS</abbr> code:</p>
			
<pre><code>#inner {
  width: 5em;
  height: 5em;
  background-color: #999;
  <strong>position: fixed;</strong>
  <strong>top: 1em;</strong>
  left: 1em;
}

#second
  width: 5em;
  <strong>height: 150em;</strong>
  background-color: #00f;
  position: absolute;
  top: 1em;
  left: 2em;
}</code></pre></li>

			<li><p>Save and reload.
			If you don’t get a vertical scrollbar, increase the <code>height</code> value for <code>#second</code>.
			(What kind of giant monitor do you have, anyway?)</p>

			<p>The tall blue element extends beyond the bottom of the window.
			Scroll the page downward, and keep an eye on the grey square in the top left-hand corner.
			<code>#inner</code> is now fixed in position 1em from the top of the window and 1em from the left side, therefore as you scroll, the grey box stays in the same place on the screen.</p></li>
		</ol>

		<h2 id="summary">Summary</h2>
		
		<p>Absolutely positioned elements are removed entirely from the document flow.
		They will overlap other content unless you make room for them.
		If all child elements of a container are absolutely positioned, the parent’s height will collapse to zero.</p>

		<p>Absolutely positioned elements are positioned with respect to a containing block, which is the nearest postioned ancestor.
		If there is no positioned ancestor, the viewport will be the containing block.</p>

		<p>Elements with fixed positioning are fixed with respect to the viewport—the viewport is always their containing block.
		They always appear at the same place inside the browser window when viewed on screen; when printed, they will appear on each page.</p>

		<p>The positions of each edge of an absolutely positioned element can be specified with the <code>top</code>, <code>right</code>, <code>bottom</code> and <code>left</code>
		properties.
		The value of each property specifies the distance of that edge to the corresponding edge of the element’s containing block.</p>

		<p>All positioned elements are rendered at a certain stack level within a stacking context.
		You can change the stack level of a positioned element using the <code>z-index</code> property.
		When <code>z-index</code> is specified as an integer value, the element establishes a local stacking context for its descentants.</p>
		
		<h2 id="exercises">Exercise questions</h2>
		
		<ul>
			<li><p>Undo the changes from the fixed positioning example and then change the stacking order between the four absolutely positioned squares so that the
			grey square is at the back, followed by the blue, yellow and cyan squares in that order. (Tip: remove all <code>z-index</code> declarations and start over.)</p></li>
			<li><p>Move the yellow square up and to the right by setting <code>top:-1em</code> and <code>left:8em</code>.
			Then make it appear <em>behind</em> the <code>#outer</code> element, so that the red border appears across the yellow square.</p></li>
			<li><p>Replicate the three-column layout we created in the <a href="http://dev.opera.com/articles/view/36-css-static-and-relative-positioning/">static and relative positioning article</a> using absolute positioning instead. Since it will be impossible to have a full-width footer, you can remove the <code>#footer</code> element, but you are not allowed to change anything else in
			the markup (other than the link to the style sheet).</p></li>
			<li><p>Modify the layout from the previous exercise to make the navigation use fixed positioning.
			You&#39;ll have to remove the automatic horizontal margins on the <code>body</code> element to make this possible.
			Add enough content to the main column and/or the sidebar to make a scrollbar appear, so that you can verify that it works.</p></li>
		</ul>

		
<ul class="seriesNav">	
<li class="prev"><a href="http://dev.opera.com/articles/view/36-css-static-and-relative-positioning/" rev="prev" title="link to the previous article in the series">Previous article—CSS static and relative positioning</a></li>
<li class="next"><a href="http://dev.opera.com/articles/view/38-headers-footers-columns-templates/" rev="next" title="link to the next article in the series">Next article—Headers, footers, columns, and templates</a></li>
<li><a href="http://dev.opera.com/articles/view/1-introduction-to-the-web-standards-cur/#toc" rel="index">Table of contents</a></li>
</ul>

	<h2>About the author</h2>

<p><img src="http://forum-test.oslo.osa/kirby/content/articles/165-37-css-absolute-and-fixed-positioning/tommyOlsson.jpg" alt="Picture of the article author Tommy Olsson" class="right" /></p>

<p>Tommy Olsson is a pragmatic evangelist for web standards and accessibility, who lives in the outback of central Sweden. He wrote his first HTML document in 1993 and is currently the technical webmaster for a Swedish government agency.</p>

<p>He has written one book so far—The Ultimate CSS Reference (with Paul O’Brien)</p>