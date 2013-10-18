Title: Form design, layout, and presentation with CSS
----
Date: 2008-09-26 06:37:18
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
<li class="prev"><a href="http://dev.opera.com/articles/view/33-styling-tables/" rel="prev" title="link to the previous article in the series">Previous article—Styling tables</a></li>
<li class="next"><a href="http://dev.opera.com/articles/view/35-floats-and-clearing/" rel="next" title="link to the next article in the series">Next article—Floats and clearing</a></li>
<li><a href="http://dev.opera.com/articles/view/1-introduction-to-the-web-standards-cur/#toc" rel="index">Table of contents</a></li>
</ul>

<h2>Introduction</h2>

<p>The <a href="http://dev.opera.com/articles/view/20-html-forms-the-basics/">HTML forms article</a> introduced you to the basics of form creation and styling.  This article carries on where that left off, providing more details about form elements and styles, and how forms are included in real-world Web application designs.</p>

<p class="note">Note that the <a href="styling_forms_code.zip">sample code is all available for download</a> so you can play with it on your local machine. In addition, there are links to the examples files running live at appropriate points during the article.</p>

<p>The contents are as follows:</p>

<ul>
  <li><a href="#newconcepts">Concepts introduced in this article</a>
    <ul>
      <li><a href="#ruletokenoverloading">Rule and token overloading</a></li>
      <li><a href="#newformelements">New form field elements</a></li>
      <li><a href="#formdesignprinciples">Form design principles</a></li>
      <li><a href="#ruleofthirds">The Rule of Thirds</a></li>
      <li><a href="#grids">Grids</a></li>
      <li><a href="#platformsupport">Platform support tiers</a></li>
    </ul>
  </li>
  <li><a href="#simpleform">A simple contact form</a>
    <ul>
      <li><a href="#markup">Markup</a></li>
      <li><a href="#changesfrompreviousform">Changes from the previous form</a></li>
      <li><a href="#shortcomings">Apparent shortcomings</a></li>
      <li><a href="#newformfields">New form fields? What&#x2019;s this?</a>
        <ul>
          <li><a href="#checkbox">Choosing descriptions: <code>input type=&quot;checkbox&quot;</code></a></li>
          <li><a href="#radio">Choosing from mutually exclusive states: <code>input type=&quot;radio&quot;</code></a></li>
          <li><a href="#select">When there are just too many choices: <code>input type=&quot;select/option&quot;</code></a></li>
          <li><a href="#select">Grouping series of controls: <code>&quot;fieldset&quot;</code></a></li>
        </ul>
      </li>
    </ul>
  </li>
  <li><a href="#walkthrough">Starting from scratch, ending with a finished form</a>
    <ul>
      <li><a href="#demo1">Demonstration 1</a></li>
      <li><a href="#demo1background">Demonstration 1: background considerations</a></li>
      <li><a href="#demo2">Demonstration 2</a></li>
      <li><a href="#demo2background">Demonstration 2: background considerations</a></li>
      <li><a href="#demo3">Demonstration 3</a></li>
      <li><a href="#demo3background">Demonstration 3: background considerations</a></li>
      <li><a href="#creatingagrid">Creating a grid</a>
        <ul>
          <li><a href="#gridframeworkwithincomposite">Creating the framework of a grid within a composite</a></li>
          <li><a href="#enforcingthegrid">Enforcing the grid in your stylesheet</a></li>
        </ul>
      </li>
      <li><a href="#demo4">Demonstration 4</a></li>
      <li><a href="#demo4background">Demonstration 4: background considerations</a></li>
      <li><a href="#ruleofthirdsexplanation">The rule of thirds</a></li>
      <li><a href="#demo5">Demonstration 5</a></li>
      <li><a href="#demo5background">Demonstration 5: background considerations</a></li>
      <li><a href="#demo6">Demonstration 6</a></li>
      <li><a href="#demo6background">Demonstration 6: background considerations</a></li>
      <li><a href="#demo7">Demonstration 7</a></li>
      <li><a href="#demo7background">Demonstration 7: background considerations</a></li>
      <li><a href="#demo8">Demonstration 8</a></li>
      <li><a href="#demo8background">Demonstration 8: background considerations</a></li>
      <li><a href="#demo9">Demonstration 9</a></li>
      <li><a href="#demo9background">Demonstration 9: background considerations</a></li>
      <li><a href="#demo10">Demonstration 10</a></li>
      <li><a href="#demo10background">Demonstration 10: background considerations</a></li>
      <li><a href="#demo11">Demonstration 11</a></li>
      <li><a href="#demo11background">Demonstration 11: background considerations</a></li>
      <li><a href="#demo12">Demonstration 12</a></li>
      <li><a href="#demo12background">Demonstration 12: background considerations</a></li>
    </ul>
  </li>
  <li><a href="#establishingplatformsupporttiers">Establishing platform support tiers</a></li>
  <li><a href="#complexformlayouts">Complex form layouts in practice (&#x2026;instead of theory)</a></li>
  <li><a href="#summary">Summary</a></li>
  <li><a href="#exercises">Exercise questions</a></li>
  <li><a href="#fractiontodecimalconversiontable">Table: fraction to decimal conversions</a></li>
  <li><a href="#bibliography">Further reading</a></li>
</ul>

<h2 id="newconcepts">Concepts introduced in this article</h2>

<p>Here you will find new information about form implementation and interface layout.</p>

<h3 id="ruletokenoverloading">Rule and token overloading</h3>

<p>Using copious numbers of <code>class</code> and <code>id</code> tokens can be said to violate the KISS Principle (explained in the <a href="http://dev.opera.com/articles/view/30-the-css-layout-model-boxes-border/">CSS box model and basic layout article</a>).  However, demanding layouts often create conflicts in the cascade &#x2014; conflicts that are most easily resolved by adding tokens to elements, and writing stylesheet rules that contain several selectors.</p>

<p>The most demanding layouts are littered with edge cases, which are often best handled by assigning an <code>id</code> to elements that define a narrow and unique context.</p>

<h3 id="newformelements">New form field elements</h3>

<p>An effective form often needs more than just buttons and text input fields, because it&#x2019;s common to frame user responses in terms of options.  HTML provides several options for the designer who encounters this requirement.</p>

<h3 id="formdesignprinciples">Form design principles</h3>

<p>A site&#x2019;s forms are usually focal points for user interaction and data collection.  For this reason, they are often critical to a site&#x2019;s success, which demands that the greatest care should be taken with their design.</p>

<h3 id="ruleofthirds">The Rule of Thirds</h3>

<p>Users are more likely to draw their attention to four specific points on a canvas (and the lines that pass through them).  This article introduces the reader to that phenomenon, and offers suggestions on how to best exploit it with CSS.</p>

<h3 id="grids">Grids</h3>

<p>Previous articles have explained how to <a href="http://dev.opera.com/articles/view/29-text-styling-with-css/">ensure consistent typesetting</a> and <a href="http://dev.opera.com/articles/view/10-colour-schemes-and-design-mockups/#alignment">get the most use from whitespace</a>.  This article takes things a step further by explaining how <code>em</code> units can be used to enforce a degree of layout consistency that cannot be accomplished without CSS.</p>

<h3 id="platformsupport">Platform support tiers</h3>

<p>One common requirement among commercial projects is near-exact rendering of the approved site design across two or more browsers.  This article will briefly explore the causes, effects, and processes related to satisfying this requirement.</p>

<h2 id="simpleform">A simple contact form</h2>

<p>Contact forms that allow site visitors to send e-mail directly to an inbox are very common, for obvious reasons: they&#x2019;re accessible to anyone with an active e-mail address, and easy to filter into a dedicated mail folder.</p>

<p>The markup used in the previous <a href="http://dev.opera.com/articles/view/20-html-forms-the-basics/">forms article</a> uses such a form, which has been extensively embellished:</p>

<h3 id="markup">Markup</h3>

<pre><code>
&lt;form id=&quot;contactForm&quot; method=&quot;post&quot; action=&quot;/cgi-bin/service_email_script.php&quot;&gt;
  &lt;ul&gt;
    &lt;li id=&quot;nameField&quot; class=&quot;required&quot;&gt;&lt;label for=&quot;realname&quot;&gt;Name:&lt;/label&gt;&lt;input type=&quot;text&quot;
      name=&quot;name&quot; value=&quot;&quot; class=&quot;medium&quot; id=&quot;realname&quot; /&gt;&lt;span
      class=&quot;note&quot;&gt;required&lt;/span&gt;&lt;/li&gt;
    &lt;li id=&quot;addressField&quot; class=&quot;required&quot;&gt;&lt;label for=&quot;address&quot;&gt;Email:&lt;/label&gt;&lt;input
      type=&quot;text&quot; name=&quot;email&quot; value=&quot;&quot; class=&quot;medium&quot; id=&quot;address&quot; /&gt;&lt;span 
      class=&quot;note&quot;&gt;required&lt;/span&gt;&lt;/li&gt;
    &lt;li id=&quot;subjectField&quot;&gt;&lt;label for=&quot;natureOfInquiry&quot;&gt;General
    subject:&lt;/label&gt;
      &lt;select name=&quot;subject&quot; class=&quot;medium&quot; id=&quot;natureOfInquiry&quot;&gt;
        &lt;option value=&quot;support&quot;&gt;Support&lt;/option&gt;
        &lt;option value=&quot;billing&quot;&gt;Accounts &amp; billing&lt;/option&gt;
        &lt;option value=&quot;press&quot;&gt;Press&lt;/option&gt;
        &lt;option value=&quot;other_q&quot;&gt;Other questions&lt;/option&gt;
      &lt;/select&gt;
    &lt;/li&gt;
    &lt;li class=&quot;required&quot; id=&quot;acctTypeField&quot;&gt;&lt;label for=&quot;acctNone&quot;&gt;Account type:&lt;/label&gt;
      &lt;fieldset&gt;
        &lt;label for=&quot;acctGold&quot;&gt;Gold&lt;/label&gt;&lt;input type=&quot;radio&quot; name=&quot;acct_type&quot; id=&quot;goldAcct&quot;
          class=&quot;rInput&quot; /&gt;
        &lt;label for=&quot;acctSilver&quot;&gt;Silver&lt;/label&gt;&lt;input type=&quot;radio&quot; name=&quot;acct_type&quot;
          id=&quot;acctSilver&quot; class=&quot;rInput&quot; /&gt;
        &lt;label for=&quot;acctBronze&quot;&gt;Bronze&lt;/label&gt;&lt;input type=&quot;radio&quot; name=&quot;acct_type&quot;
          id=&quot;acctBronze&quot; class=&quot;rInput&quot; /&gt;
        &lt;label for=&quot;acctNone&quot;&gt;None&lt;/label&gt;&lt;input type=&quot;radio&quot; name=&quot;acct_type&quot; id=&quot;acctNone&quot;
          class=&quot;rInput&quot; checked=&quot;checked&quot; /&gt;
      &lt;/fieldset&gt;
      &lt;span class=&quot;note&quot;&gt;required&lt;/span&gt;
    &lt;/li&gt;
    &lt;li id=&quot;availabilityField&quot;&gt;
      &lt;label for=&quot;availability&quot;&gt;My account is unavailable:&lt;/label&gt;&lt;input type=&quot;checkbox&quot;
        name=&quot;is_down&quot; id=&quot;availability&quot; class=&quot;rInput&quot; /&gt;&lt;/li&gt;
    &lt;li id=&quot;messageField&quot;&gt;&lt;label for=&quot;messageBody&quot;&gt;Comments:&lt;/label&gt;&lt;textarea name=&quot;comments&quot;
      cols=&quot;32&quot; rows=&quot;8&quot; class=&quot;long&quot; id=&quot;messageBody&quot;&gt;&lt;/textarea&gt;&lt;/li&gt;
    &lt;li class=&quot;submitField&quot;&gt;&lt;input type=&quot;submit&quot; value=&quot;Send&quot; class=&quot;submitButton&quot; /&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/form&gt;</code></pre>

<h3 id="changesfrompreviousform">Changes from the previous form</h3>

<p>In addition to including several new elements, a number of classes and IDs have been added to the markup that can be referenced from the stylesheet.  These allow each form, field/value pair, and field to be referenced individually, regardless of context.</p>
<p>The new identifiers also make it possible for the stylist to distinguish fields that <em>must</em> be filled out, from fields that don&#x2019;t.</p>
<p>Finally, there are a few new classes that provide suggestions of the amount and types of information that should be displayed by the form elements to which they are attached.  These classes make it possible to apply layout details to multiple, arbitrary elements all at once.</p>

<h3 id="shortcomings">Apparent shortcomings</h3>

<p>Since the demonstration form is understood to be primary content, the <code>legend</code> used in the previous forms article has been replaced with a heading.</p>
<p>Legends are most appropriate within <code>fieldset</code>s, in lieu of <code>label</code>s (which are meant to relate to single controls).  In this instance the <code>legend</code> element has been omitted entirely, because it&#x2019;s difficult to style.</p>
<p>Something else worth noting is that &#x201C;required&#x201D; tags on fields are best placed <em>before</em> the field in source order, to accommodate users of screen reader software.  However, the <code>position</code> property (which is beyond the scope of this article) is necessary to lay these items out appropriately.  For this reason, the &#x201C;required&#x201D; tags have been placed <em>after</em> their associated controls in the source order (albeit in the same context).</p>

<h3 id="newformfieldswhat">New form fields? What&#x2019;s this?</h3>

<p>Text fields and submit controls were introduced in the previous article.  As pointed out above, there are a number of use cases that require the user to be able to select from two or more options. Those elements are described in brief below.</p>

<h4 id="checkbox">Choosing descriptions: <code>input type=&quot;checkbox&quot;</code></h4>

<pre><code>      &#x2026;
      &lt;label for=&quot;availability&quot;&gt;My account is unavailable:&lt;/label&gt;&lt;input type=&quot;checkbox&quot;
        name=&quot;is_down&quot; id=&quot;availability&quot; class=&quot;rInput&quot; /&gt;</code></pre>
<p>Opt-in and opt-out questions are usually handled with one of these controls.  Another case in which they are used is when there is a need to choose arbitrarily from several options, eg, a list of personal interests.</p>

<h4 id="radio">Choosing from mutually exclusive states: <code>input type=&quot;radio&quot;</code></h4>

<pre><code>      &#x2026;
      &lt;label for=&quot;acctNone&quot;&gt;Account type:&lt;/label&gt;
      &lt;fieldset&gt;
        &lt;label for=&quot;acctGold&quot;&gt;Gold&lt;/label&gt;&lt;input type=&quot;radio&quot; name=&quot;acct_type&quot; id=&quot;goldAcct&quot;
          class=&quot;rInput&quot; /&gt;
        &lt;label for=&quot;acctSilver&quot;&gt;Silver&lt;/label&gt;&lt;input type=&quot;radio&quot; name=&quot;acct_type&quot;
          id=&quot;acctSilver&quot; class=&quot;rInput&quot; /&gt;
        &lt;label for=&quot;acctBronze&quot;&gt;Bronze&lt;/label&gt;&lt;input type=&quot;radio&quot; name=&quot;acct_type&quot;
          id=&quot;acctBronze&quot; class=&quot;rInput&quot; /&gt;
        &lt;label for=&quot;acctNone&quot;&gt;None&lt;/label&gt;&lt;input type=&quot;radio&quot; name=&quot;acct_type&quot; id=&quot;acctNone&quot;
          class=&quot;rInput&quot; checked=&quot;checked&quot; /&gt;
      &lt;/fieldset&gt;</code></pre>
<p>A group of these allows you to present several options side by side, of which only one can be chosen. One good example of a use case for a set of <code>radio</code> controls is the assignment of a rating on a 1&#x2013;5 or 1&#x2013;10 scale.</p>
<p>Unlike other form controls, <code>radio</code> controls not only allow but actually <em>require</em> that associated controls share the same <code>name</code>.</p>
<p>These elements take their name from an interface common to mechanically tuned car radio sets. Unlike the programmable presets common to digitally tuned sets, mechanical &#x201C;preset&#x201D; buttons typically center the receiver on a range of frequencies within the band being tuned in, when pressed.</p>
<p>Both <code>checkbox</code> and <code>radio</code> controls allow a <code>checked</code> attribute, which if set activates the control by default when it is first rendered.</p>
<p>The question of using <code>radio</code> controls instead of <code>checkbox</code> controls is best answered after considering a number of different factors.  If you want the user to confirm a subjective choice (such as opting in to a mailing list), then <code>checkbox</code> controls are probably best.  If you want instead for a user to choose between two objective options (like, say, gender), then <code>radio</code> controls should be used instead.</p>

<h4 id="select">When there are just too many choices: <code>select</code>/<code>option</code></h4>

<pre><code>    &#x2026;
    &lt;label for=&quot;natureOfInquiry&quot;&gt;General
    subject:&lt;/label&gt;
      &lt;select name=&quot;subject&quot; class=&quot;medium&quot; id=&quot;natureOfInquiry&quot;&gt;
        &lt;option value=&quot;support&quot;&gt;Support&lt;/option&gt;
        &lt;option value=&quot;billing&quot;&gt;Accounts &amp; billing&lt;/option&gt;
        &lt;option value=&quot;press&quot;&gt;Press&lt;/option&gt;
        &lt;option value=&quot;other_q&quot;&gt;Other questions&lt;/option&gt;
      &lt;/select&gt;</code></pre>
<p>The <code>select</code> and <code>option</code> elements offer results similar to those provided by a series of <code>radio</code> controls, while taking up much less space.  Choosing a <code>select</code> element in preference to a series of <code>radio</code> controls is often a matter of how the space within the user interface is used; a long list of geographical areas or departments within an e-commerce site is typically better suited to a <code>select</code> elements, while a shorter series of choices (eg yes/no, true/false, age ranges, income ranges) should instead be laid out as series of <code>radio</code> controls.</p>
<p>Thoughtful self-testing will reveal that the level of fine motor control required to manipulate a <code>select</code> list is high, but increases only slightly in proportion to the number of <code>option</code>s it contains. The practical result is that short lists of mutually exclusive options are best formatted as a series of <code>radio</code> controls with properly written <code>label</code>s.</p>

<h4 id="fieldset">Grouping series of controls: <code>fieldset</code></h4>

<p>The principal purpose of the <code>fieldset</code> element is to assign a single context to a series of closely related controls (<code>text</code> controls for a phone number, <code>select</code> elements for a date, etc.).</p>

<h2 id="walkthrough">Starting from scratch, ending with a finished form</h2>

<p>Now that the new material in this article has been outlined, it&#x2019;s time to see that material in action &#x2014; the twelve demonstrations that follow progress through various design concepts and styling challenges that are encountered when developing Web forms.</p>

<p><strong>Readers are strongly encouraged to save the demonstration material to their own hard drives and experiment with the stylesheet rules.</strong></p>

<p class="note">These demonstrations progress in source order, rather than the order in which the stylesheet was authored.  The reasons and implications of that deviation are discussed later in this article.</p>

<h3 id="demo1">Demonstration 1</h3>

<p>Starting with a rule that reads <code>html { margin: 0; padding: 0; }</code>, the first step is to configure the <code>body</code> of the containing page.</p>

<h4>Links:</h4>

<ul>
  <li><a href="demo_form_unstyled.html" target="BMHDemoWindow">More-or-less unstyled page</a></li>
  <li><a href="demo_form01.html" target="BMHDemoWindow">With <code>body</code> styles applied</a></li>
</ul>

<h4>New styles:</h4>

<pre><code>body { 
  margin: 0;
  padding: 1.714em;
  background-image: url(images/bg_grid.gif);
  font-size: 14px;
  font-family: Helvetica,Arial,sans-serif;
  line-height: 1.714em;
}</code></pre>

<h3 id="demo1background">Demonstration 1: background considerations</h3>

<ul title="Discussion of box rendering according to Content-Type, and other considerations related to Demo. 1">
  <li>When XHTML is served with the proper <code>Content-Type</code>, to a user agent that supports it properly, default page <code>margin</code> and/or <code>padding</code> are rendered in the <code>html</code> element.</li>
  <li>In cases other than that described in the above bullet, a 10px gutter is placed around the circumference of the page; Opera provides this as a <code>padding</code> value, while other mass market browsers provide it (somewhat counterintuitively) as a <code>margin</code> value.  The demonstration stylesheet normalizes the result.</li>
  <li>While many accessibility purists will object to the <code>14px</code> typesize value, it&#x2019;s integral to the various box and type properties specified elsewhere in the stylesheet, denominated in sevenths of an <code>em</code> for the most part.  A fraction-to-decimal conversion chart is provided at the end of the article for those who want some insight on the arithmetic used.</li>
  <li>The <code>14px</code> value was chosen because it&#x2019;s the smallest size of body copy that can be read by practically everyone with corrected vision.</li>
  <li>Since one of the purposes of this article is to demonstrate the work that goes into a superlatively consistent grid, a grid background in increments of 24 pixels has been applied to the page.</li>
</ul>

<h3 id="demo2">Demonstration 2</h3>

<p>Now that the page containers have been wrangled, the next couple of steps alter or remove user agent styles.</p>
<h4>Links:</h4>

<ul>
  <li><a href="demo_form02.html">Style the primary heading and remove undesired gutters</a></li>
</ul>

<h4>New styles:</h4>

<pre><code>h3 {
  margin: 0 0 1.2em 0;
  border-bottom: .05em solid rgb(0,96,192);
  font-size: 1.429em;
  line-height: 1.15em;
}

form {
  width: 35.929em;
  margin: 0;
}

ul {
  margin: 0;
  padding: 0;
  list-style-type: none;
}</code></pre>

<h3 id="demo2background">Demonstration 2: background considerations</h3>

<ul>
  <li>The progression of typesize for headings varies from one platform to the next; however, the default values are always a proportion of the <code>medium</code> value used for unstyled paragraph text, and thus are inherited via the cascade. The result of the value provided here is to change the default proportion.</li>
  <li>It&#x2019;s considered optimal to use <code>h1</code> for the first heading on a page; here that practice is ignored because in a commercial production environment, the site title is often an <code>h1</code> on page and the page title should be placed lower in the heading hierarchy. In many cases, the form&#x2019;s prominence will be equal to the prominence of other content or forms in the same document.</li>
  <li><p>The goal of the <code>h3</code> styling is to create a content box 24 pixels high with 24 pixels of gutter immediately below, so that:</p>
    <pre><code>(((14 &#xD7; 1.429) &#xD7; 1.15) + (20 &#xD7; .05)) &#x2248; 24

14 * 1.429 &#x2248; 20; 20 * 1.15 == 23; 20 * .05 == 1;</code></pre>

<pre><code>(20 &#xD7; 1.2) = 24</code></pre></li>

  <li>The assignment of a <code>width</code> value to either the <code>form</code> or the list items is needed, if the elements are to be properly justified <em>without</em> relying on positioning.  The value used yields a static value of 503 pixels; the one pixel discrepancy (given an atomic grid unit of 24 pixels) is a product of errors produced by rounding and anti-aliasing.</li>
  <li>The default useragent styles for lists vary from one browser to the next.  Internet Explorer gives each list item a left margin of 40 pixels and places the item bullet in the resulting gutter, while other browsers apply padding to the left side of the form&#x2019;s content block as a whole.  As with the layout properties changed in the <code>body</code> rule, this rule is designed specifically to normalize presentation across browsers.</li>
</ul>

<h3 id="demo3">Demonstration 3</h3>

<p>&#x2026;Now to set up the containers for form elements.</p>

<h4>Links:</h4>
<ul>
  <li><a href="demo_form03.html">Style list items (label/value pair containers) and the <code>fieldset</code></a></li>
</ul>

<h4>New styles:</h4>
<pre><code>
li {
  clear: both;
  height: 1.714em;
  margin: 0;
}

fieldset {
  height: 1.429em;
  margin: 0 0 -.143em 0;
  border: 0;
}</code></pre>

<h3 id="demo3background">Demonstration 3: background considerations</h3>

<ul>
  <li>If one thinks of the form as a series of <em>rows</em>, the need to style the height of each in order to preserve a grid becomes obvious. The margins of the list items are set to zero for the benefit of Internet Explorer, and for good measure otherwise.</li>
  <li>Because many elements in the form will be given <code>float</code> values, the containing list items are assigned a value of <code>clear: both</code> to ensure that each will fall below its predecessor as a matter of course.</li>
  <li>Apart from the removal of the border (which is part of the user agent default style), the layout properties of the <code>fieldset</code> appear to have been set arbitrarily.  In fact, they were assigned after cross-browser testing, which is discussed again briefly in the notes attached to Demonstration 11.</li>
  <li>At this point, no <code>display</code> or <code>float</code> values have been assigned, which explains why the contents of the <code>fieldset</code> collide with the following <code>select</code> control.</li>
</ul>

<h3 id="creatingagrid">Creating a grid</h3>

<p>One of the most significant strengths of good graphic design (and with it, good interface design) is that things are laid out at predictable intervals.  These intervals are typically referred to as the <strong>grid</strong>.</p>
<p>As pointed out above the atomic grid unit of the demonstration form is 24 pixels square, but there&#x2019;s more to coherent layout than ensuring that design elements are placed at small-yet-predictable intervals. A truly effective grid has the following characteristics:</p>

<ul title="Characteristics of an effective grid.">
  <li>Column margins are placed at consistent grid intervals throughout the document.</li>
  <li>Sequential sections within the same document share top margins with items in neighboring columns.</li>
  <li>Illustrations within a layout are cropped or matted to dimensions that respect the widths of both columns and atomic grid intervals.</li>
  <li>Even in cases where content falls into a single column punctuated with <code>float</code>ed elements, the latter elements all share close commonalities of size and composition.</li>
</ul>

<p>Layouts that manifest these characteristics are more attractive and easier to follow, which makes for a more usable site.</p>

<h4 id="gridframeworkwithincomposite">Creating the framework of a grid within a composite</h4>

<p>The tool used by most professionals to create site layout composites is Adobe Photoshop, and one of its strengths is the easy access to grid lines that it provides.  To display an atomic grid in Photoshop, you can select View &#x2192; Show &#x2192; Grid, which will display grid lines at the intervals set in Guides &amp; Grid Preferences.</p>
<p>Superimposing guides for things like columns is then accomplished by selecting View &#x2192; Rulers, switching to the Move tool, and dragging the pointer from the ruler as needed.</p>

<h4 id="enforcingthegrid">Enforcing the grid in your stylesheet</h4>

<p>As the <a href="http://dev.opera.com/articles/view/29-text-styling-with-css/">text styling article</a> points out &#x2014; reinforced by a few of the rules included in the demonstration stylesheet &#x2014; the best way to enforce an atomic grid within a layout is to rely on <code>em</code> units.  However, that by itself is not enough; the stylist must also keep their fraction-to-decimal conversions straight when dealing with alternate type sizes, gutters, and borders.</p>
<p>Another technique for enforcing grids is revealed in the demonstration stylesheet: the provision of <code>class</code> tokens that can refer to various element and column sizes in a document.  When used consistently, these tokens do most of the work of enforcing your grid.</p>

<h3 id="demo4">Demonstration 4</h3>

<p>Keeping things aligned to a grid means assigning layout properties to the labels and form controls.</p>

<h4>Links:</h4>

<ul>
  <li><a href="demo_form04.html">Line up the two primary columns</a></li>
</ul>

<h4>New styles:</h4>

<pre><code>label {
  display: block;
  float: left;
  clear: left;
  width: 10.286em;
  overflow: auto;
  padding-right: 1.714em;
  text-align: right;
}

input {
  height: 1.143em;
  border: .071em solid rgb(96,96,96);
  padding: .071em;
  line-height: 1;
}</code></pre>

<h3 id="demo4background">Demonstration 4: background considerations</h3>

<ul>
  <li><em>All</em> form controls, including textareas and labels, are rendered as <code>%inline</code> elements <em>by default</em>.</li>
  <li>In order to create a consistent left column, a <code>width</code> needs to be assigned to the <code>label</code> elements; in &#x201C;strict&#x201D; rendering mode, the <code>padding</code> supplied alongside makes a workable gutter between controls and labels a certainty.</li>
  <li>Making both labels and controls flush to a common margin makes the form easy to follow. This fact and other points of composition are discussed as part of the discussion of the Rule of Thirds - see below.</li>
  <li>At this point, there are obvious problems with the form:<ul>
    <li>The <code>label</code>s attached to the <code>radio</code> controls are assigned the same <code>display</code> and <code>float</code> values as the other <code>label</code>s on the form. In tandem with the existing <code>height</code> and <code>overflow</code> values, these elements collide with the following label-control pair in some browsers.</li>
    <li>In Safari 3, the borders of text controls disappear in this slide. One suspects that this is a rendering bug.</li>
    <li>The <code>radio</code> controls appear flush to one another in source order; this occurs because the intervening <code>label</code> controls are presently in a different layout context.</li>
  </ul></li>
  <li>Another curiosity that bears mention is the assignment of <code>overflow: auto</code> to labels. The magic dust being applied here can be described as a rule: given one <code>%block</code> element within another, <em>and</em> given that only one of those has a <code>height</code> specified in static units or <code>em</code>s that expand to a known number of pixels, assigning <code>overflow: auto</code> to the <em>other</em> element &#x2014; the one <em>without</em> a <code>height</code> value &#x2014; will cause it to expand to the height of the element <em>with</em> a discrete <code>height</code> value. This technique is also used in Demonstration 11.</li>
</ul>

<h3 id="ruleofthirdsexplanation">The Rule of Thirds</h3>

<img src="http://forum-test.oslo.osa/kirby/content/articles/162-34-form-design-layout-and-presentation-with-css/bmh_forms_fig1.jpg" width="278" height="278" alt="An early springtime scene on the north side of Pioneer Square, Portland, Oregon; superimposed with lines dividing the photo into nine more or less equal parts." />
<p class="comment">Figure 1: An early springtime scene in Portland, Oregon. This photo has been superimposed with lines illustrating the Rule of Thirds; note how the lower right intersection and the lines that form it bound the visible activity. Photo &#xA9;2000 by the author; all rights reserved.</p>
<p>When we consider what makes for excellent composition, there&#x2019;s a nearly universal trope: if you divide a layout or illustration into thirds, you will discover that viewers want to draw their attention to the lines (and especially the intersections of the lines) that mark those divisions. Failure to put this uncanny tendency to work can cause a layout to seem unbalanced.</p>

<p>The simplest explanation for this phenomenon is that those four lines conform closely to grids that follow the Golden Ratio, a proportion that is close in value to one-sixth.  The Golden Ratio is frequently encountered in various fields of mathematics and in the natural world.</p>
<img src="http://forum-test.oslo.osa/kirby/content/articles/162-34-form-design-layout-and-presentation-with-css/bmh_forms_fig2.png" width="278" height="170" alt="A screen capture of msnbc.msn.com with the first seven golden rectangles superimposed on the layout." />
<p class="comment">Figure 2: A screen capture of msnbc.msn.com superimposed by the first seven golden rectangles. The dimensions of the fourth and fifth rectangles side-by-side illuminate the nature of the page layout grid as a whole.</p> 

<p>The demonstration form was laid out so that the form controls would justify to a left margin placed one-third of the distance to the notional right margin of the form as a whole; this choice was deliberate.  Much <em>less</em> deliberate is the <em>vertical</em> composition of the form &#x2014; when the heading is taken into account, the text fields hew to the two lines described in the preivous paragraph.  Even if the heading <em>isn&#x2019;t</em> taken into account, the required fields hew to the uppermost of those lines.</p>

<p>The salient point for a stylist is that if the Rule of Thirds and the grid are taken into account <em>before</em> starting work on a stylesheet, the task of <em>normalizing</em> the stylesheet can be simplified considerably.</p>

<h3 id="demo5">Demonstration 5</h3>

<p>To ensure that the intended grid is preserved vertically as well as horizontally, some particulars need to be seen to. These changes are almost entirely cosmetic.</p>

<h4>Links:</h4>

<ul>
  <li><a href="demo_form05.html">Tweak the presentation of the <code>textarea</code> and <code>select</code> controls</a></li>
</ul>

<h4>New styles:</h4>
<pre><code>textarea {
  height: 4.714em;
  margin-bottom: .286em;
  border: .071em solid rgb(96,96,96);
  padding: 0;
}

select {
  display: block;
  float: left;
  height: 1.571em;
  font-family: Futura,&#39;Century Gothic&#39;,sans-serif;
}

option { font-size: 100%; }</code></pre>

<h3 id="demo5background">Demonstration 5: background considerations</h3>

<ul>
  <li>On Windows platforms, <code>select</code> controls can be altered to remove some beveling, which makes them resemble the text controls more closely.</li>
  <li>Since ease of use is generally improved by giving the user a way to distinguish at a single glance their input from the rest of a form, the typeface used to represent form values will be different from that used on the rest of the form. With this in mind, this demonstration applies the first of those values.</li>
  <li>The cascade tends not to be observed with respect to text rendering in form controls, which is another reason why there are a number of text/font values in evidence here.  <code>inherit</code> was avoided as a matter of preference and habit, but not for any objective reason.</li>
</ul>

<h3 id="demo6">Demonstration 6</h3>

<p>The previous demonstration manipulated some type rendering; now it&#x2019;s time to finish the job.</p>

<h4>Links:</h4>
<ul>
  <li><a href="demo_form06.html">Normalize the presentation of the <code>text</code> controls and adjust the effect of the cascade on <code>select</code> control text</a>.</li>
</ul>

<h4>New styles:</h4>

<pre><code>input, textarea {
  display: block;
  float: left;
  overflow: hidden;
  font-family: Futura,&#39;Century Gothic&#39;,sans-serif;
  font-size: 1em;
}

input, textarea, select {
  margin-top: 0;
  font-size: 100%;
}</code></pre>

<h3 id="demo6background">Demonstration 6: background considerations</h3>

<ul>
  <li>In this demonstration we see the first instance of values that have been deliberately put aside for simultaneous assignment to multiple selectors.  The absence of <code>border</code> values from these rules is an artifact of the production process, which was conducted in a different order than the presentation of these demonstrations &#x2014; a point which is discussed in more detail later.</li>
  <li>As mentioned above, text and font values in form controls do <strong>not</strong> get the benefit of the cascade. These rules address that issue.  Consequently, most of the various controls now conform to the desired layout.</li>
  <li>Because of the behavior of Internet Explorer 6, the balance of the form controls are given a <code>float</code> value of <code>left</code>.  This value was assigned out of habit informed by (unpleasant) experience, but is not strictly necessary.</li>
  <li>With the assignment of <code>block</code> values to the text controls, the Safari rendering problem seen in the two previous demonstrations has suddenly been resolved. Oddities like these are common when styling forms.</li>
  <li>Just as <code>border</code> values were not properly normalized, nor were <code>font-size</code> values; the assignment of <code>1em</code> values to text controls and <code>100%</code> values to <code>select</code> controls was entirely arbitrary.</li>
</ul>

<h3 id="demo7">Demonstration 7</h3>

<p>The widths of the various text controls need to be changed from their default values.</p>

<h4>Links:</h4>
<ul>
  <li><a href="demo_form07.html">Alter the widths of text controls to make them more usable, or at least more consistent</a></li>
</ul>

<h4>New styles:</h4>

<pre><code>.medium { width: 11.714em; }

select.medium { width: 12em; }

.long { width: 20.429em; }

.rInput { border: 0; }</code></pre>

<h3 id="demo7background">Demonstration 7: background considerations</h3>

<ul>
  <li>A re-examination of the source markup will reveal that each control has been assigned a <code>class</code> &#x2014; one of three width-related controls for text and <code>select</code> controls, and other classes for controls that rely on pointer/cursor input rather than keyboard input.</li>
  <li>Classes need to be assigned to controls mostly because Internet Explorer&#x2019;s support for advanced selectors is limited.  As selectors go, the <code>rInput</code> <code>class</code> could just as easily be superseded by  <code>input[type=&quot;radio&quot;], input[type=&quot;checkbox&quot;]</code>&#x2026; if current production versions of Internet Explorer supported the latter at all.</li>
  <li>The assignment of <em>three</em> possible values for text controls is entirely arbitrary, and left up to the designer. In commercial settings, some designers deliver work so <em>particular</em> about layout that <code>class</code> selectors like those used here would be functionally useless.  Assigning an <code>id</code> to each label/control pair provides the simplest possible reference to each element with the form &#x2014; simplicity that&#x2019;s valuable when styling the work of a designer who insists on putting his touch on every little nook of the site layout.</li>
</ul>

<h3 id="demo8">Demonstration 8</h3>

<p>The form&#x2019;s submit button has been languishing&#x2026;</p>

<h4>Links:</h4>
<ul>
  <li><a href="demo_form08.html">Precisely adjust the composition of the form&#x2019;s submit button</a></li>
</ul>

<h4>New styles:</h4>
<pre><code>.submitButton {
  display: block;
  clear: both;
  width: 7.2em;
  height: 2em;
  margin: 0 0 0 16.8em;
  border: 1px solid rgb(128,128,128);
  padding: 0;
  font-size: 10px;
  text-align: center;
}</code></pre>

<h3 id="demo8background">Demonstration 8: background considerations</h3>

<ul>
  <li>The greatest challenge faced when styling submit buttons is to compose them <em>exactly</em> as desired by the designer.  In common practice the desired look is obtained only after extensive dithering with layout and <code>line-height</code> properties; some developers might find it less time-consuming to use image replacement (see Bibliography) or <code>input type=&quot;image&quot;</code> instead.</li>
  <li>At first glance, the assignment of <code>display: block</code> to this item appears redundant &#x2014; and certainly is, if we think solely in terms of a single form on a single page. However, in the context of an entire site it might not be redundant; many sites and applications have multiple forms in one document with differing <code>display</code> values.</li>
</ul>

<h3 id="demo9">Demonstration 9</h3>

<p>Put the &#x201C;required&#x201D; tags where they belong.</p>

<h4>Links:</h4>
<ul>
  <li><a href="demo_form09.html">Move the &#x201C;required&#x201D; tags flush to the notional right margin of the form, and change their text properties</a></li>
</ul>

<h4>New styles:</h4>

<pre><code>li.required span.note {
  display: block;
  width: auto;
  float: right;
  color: rgb(128,128,128);
  font-size: .714em;
  line-height: 2.4em;
  font-style: italic;
}</code></pre>

<h3 id="demo9background">Demonstration 9: background considerations</h3>

<ul>
  <li>In its current state, the <code>fieldset</code> containing the <code>radio</code> controls is still a block element, so it stretches all the way to the right margin of the form.  As a result, the tag attached to this set of controls is pushed below the calculated bottom of the <code>fieldset</code>.</li>
  <li>The <code>auto</code> value supplied for the <code>width</code> of the &#x201C;required&#x201D; tags mandates that they should be no wider than their content.</li>
  <li>A closer look at the arithmetic used for the typesetting of the &#x201C;required&#x201D; tags will reveal a typesize of ten pixels, and leading of 24 pixels (equivalent to one atomic unit of the grid being used).</li>
  <li>The structure used to indicate required fields was built with user interactivity in mind; with the various classes applied to the form it&#x2019;s possible to validate user input with JavaScript and change the styling of labels, fields, and/or tags in label/control sets that were not properly manipulated by the user.</li>
</ul>

<h3 id="demo10">Demonstration 10</h3>

<p>It&#x2019;s finally time to settle up the collisions of the <code>radio</code> controls with the fields below them in the source order.</p>

<h4>Links:</h4>
<ul>
  <li><a href="demo_form10.html">Line up the <code>radio</code> controls and their labels horizontally</a></li>
</ul>

<h4>New styles:</h4>

<pre><code>fieldset label {
  margin-right: .25em;
  padding-right: 0;
  line-height: 1;
}

fieldset .rInput { margin-right: .75em; }

fieldset label, fieldset .rInput {
  width: auto;
  display: inline;
  float: none;
  font-size: .857em;
}

li.required fieldset {
  width: 18.857em;
  float: left;
}</code></pre>

<h3 id="demo10background">Demonstration 10: background considerations</h3>

<ul>
  <li>The main result of these rules, apart from making cosmetic adjustments, is to change the <code>display</code> value of <code>radio</code> and <code>checkbox</code> controls back to <code>inline</code>.  This is done to avoid the hassles that go in hand with floating them like the rest of the <code>input</code> elements in the form.</li>
  <li>In spite of the assignment of <code>display: inline</code> to the associated controls, they remain as &#x201C;replaced&#x201D; elements: inline elements with known static dimensions at runtime (ie, before the browser actually begins to render the content).  For this reason margins can be applied to these items.</li>
  <li>The peculiar nature of <code>fieldset</code> elements &#x2014; specifically, that they are the only <code>%block</code> elements intended <em>specifically</em> for use in forms &#x2014; requires that a discrete width be applied in this case to any <code>fieldset</code> containing controls that <em>require</em> user activation. (See the discussion of the &#x201C;required&#x201D; tag layout values above.)</li> 
</ul>

<h3 id="demo11">Demonstration 11</h3>

<p>For the last hurrah, to get the last bits lined up just-so&#x2026;</p>

<h4>Links:</h4>

<ul>
  <li><a href="demo_form11.html">Make final layout tweaks to various controls</a></li>
</ul>

<h4>New styles:</h4>
<pre><code>#acctTypeField fieldset {
  padding: .286em 0 0 0;
  line-height: normal;
}

#acctTypeField .rInput { margin-top: .167em; }

#availabilityField label {
  height: 3.143em;
  padding-top: .286em;
  line-height: normal;
}

#availabilityField .rInput { margin-top: .286em; }

#availabilityField, #messageField {
  height: 1%;
  overflow: auto;
}</code></pre>

<h3 id="demo11background">Demonstration 11: background considerations</h3>

<ul>
  <li>The <code>overflow</code> magic applied in Demonstration 4 is repeated here; <code>#availabilityField</code> has a <code>label</code> of known <code>height</code>, and <code>#messageField</code> a <code>textarea</code> likewise.</li>
  <li>The use of the <code>#acctTypeField</code> token to change the <code>padding</code> value of the <code>fieldset</code> it contains may well be too specific.  However, delicate handling is called for when writing styles that can be so easily influenced by the styles of neighboring elements.</li> 
  <li>The rest of the rules in this stylesheet block make minor adjustments to layout, all of which were determined in the course of testing.  Unfortunately, hours of testing and tweaking fail to reveal behavior that will produce identically composed <code>radio</code> controls in both Safari 3 and Firefox 3.  The result is a baseline on the <code>radio</code> control <code>label</code>s that is off-kilter in Firefox 3.  Generally, it can be said that styling <code>checkbox</code> and <code>radio</code> controls is something of a black art.</li>
</ul>

<h3 id="demo12">Demonstration 12</h3>

<p>All of the preceding styles were developed for Opera or Safari (take your pick, they both behaved comparatively well). The ones that follow are specific to Internet Explorer, specified in a CSS file <code>link</code>ed within a conditional comment block.</p>

<h4>Links:</h4>

<ul>
  <li><a href="demo_form_complete.html">Make the last set of adjustments for Internet Explorer</a></li>
</ul>

<h4>New styles:</h4>

<pre><code>h3 { margin-bottom: 1.2em; }
li { margin: 0 0 -.214em 0; }

select { height: 1.429em; }

textarea { height: 4.571em; }

fieldset {
  height: 1.583em;
  padding-top: .417em;
}

.medium { width: 13.429em; }

select.medium { width: 13.714em; }

.long { width: 20.286em; }

fieldset .rInput { border: 0 !important; }

#subjectField { margin-bottom: -.214em; }

#availabilityField .rInput { margin-top: .286em; }

#messageField { padding-bottom: .286em; }

input.submitButton { margin-top: .15em; }

* html input, * html textarea { float: left; }

* html select { font-size: .643em; }

* html select.medium { width: 21.364em; }

* html textarea { height: 4.643em; }

* html #subjectField {
  margin-top: .071em;
  margin-bottom: 0;
}

* html #availabilityField label { padding-top: 0; }

* html input.submitButton { margin: .1em 0 0 7em; }</code></pre>

<h3 id="demo12background">Demonstration 12: background considerations</h3>

<ul>
  <li>As you can see, <em>all</em> of the styles displayed above suggest slight differences in the way that Internet Explorer cascades type sizes and lays out boxes.</li>
  <li>Another matter worth raising is the <code>* html</code> selector.  Internet Explorer 5 and 6 are the only browsers that recognize this selector, which makes it an effective low-pass filter for stylesheet rules targeted to those browsers.</li>
</ul>

<h2 id="establishingplatformsupporttiers">Establishing platform support tiers</h2>

<p>The last section of the demonstration illustrates the kind of styles set aside for Internet Explorer 6 and 7, and begs a discussion of how widely varying browsers are treated by the conscientous site design team.</p>

<p>The reality of the Web is that users run a wide assortment of browsers in all manner of environments.  Some are old, while others are on the bleeding edge.  Some run on fully featured computers, while others run on mobile devices such as telephones.  All of them are developed on specific operating systems, then <em>ported</em> to others with varying degrees of standards support. With the exception of Opera, all browser vendors ship products that are designed to be used alongside other titles in a larger suite of products &#x2014; a design requirement that makes those browsers more complex than necessary for the single task of browsing the Web.</p>

<p>As if the manifold strengths and weaknesses of browsers weren&#x2019;t enough to consider, there is also the matter of bugs &#x2014; security bugs, component bugs, and especially rendering bugs. Users of Safari 3.x have discovered that at one point, the demonstration document uncovers a discomfiting rendering bug in their own browser of choice.</p>

<p>The best manner of dealing with these issues is to define support tiers.  This practice was first promulgated by the interface development team at Yahoo!, which refers to it as &#x201C;Graded Browser Support.&#x201D;</p>

<p>Generally, support tiers fall into four broad categories:</p>

<ol title="A general description of the Graded Browser Support paradigm." style="list-style-type: upper latin">
  <li>Site renders as originally composed within the limits of these browsers&#x2019; capabilities, and all features are fully supported. The development platform defines what is sometimes called the &#x201C;A+&#x201D; tier.</li>
  <li>Deviation from the preferred composition is evident, perhaps to a significant degree; however, the site is still usable, and most if not all site features are supported.</li>
  <li>The site served to users of these browsers is as plain as can be managed without tarnishing the site owner&#x2019;s brand, and site features may well be disabled. These browsers typically have comparatively small install bases and are judged to be outdated, unstable, or underfeatured.</li>
  <li>Referred to in the Yahoo! documentation as &#x201C;X Grade&#x201D; support, this level of support is reserved for <em>untested</em> platforms &#x2014; typically newer browsers with small install bases (often Opera, natch). Once tested, such browsers are promoted to a higher tier.</li>
</ol>

<p>The particulars of the requirements gathering process that inform the definition of support tiers and assign browsers to them run to the long and tedious, and for that reason will be omitted from this already long article.</p>

<h2 id="complexformlayouts">Complex form layouts in practice (&#x2026;instead of theory)</h2>

<p>Among the background notes provided above, it was stated that the demonstration was staged in the stylesheet source order, rather than the order in which rules were actually added to the stylesheet. The reasons for doing so include:</p>
<ul title="Reasons why the demonstration was staged in source order.">
  <li>In order to outline a timeline-based series of demonstrations it was necessary to keep a journal (or to store the stylesheet in a versioning system) - a step that was never taken. By the time that oversight was noticed, this article was too far past deadline to correct it.</li>
  <li>Staging according to source order makes it far easier to produce the demonstration documents &#x2014; yet another concession of the ideal to the practical.</li>
  <li>Since the original demonstration stylesheet was written with considerable (if not complete) care to normalization and source order &#x2014; as all production stylesheets should be &#x2014; staging the demonstration in source order guarantees that those students wishing to &#x201C;View the Source&#x201D; will have a far easier time making sense of what&#x2019;s actually being served.</li>
</ul>

<p>Opera 9.6 for OS X was the useragent used for development; with that caveat and the others above supplied, here&#x2019;s the general order in which changes and additions were made to the stylesheet:</p>

<ol title="Order in which the demonstration stylesheet was written.">
  <li>Document (ie, <code>body</code>) styles applied</li>
  <li>list, form, and <code>fieldset</code> defaults reset</li>
  <li>typesetting specified</li>
  <li>list items constrained and <code>clear</code>ed</li>
  <li><code>label</code>s laid out in whole</li>
  <li>form control layout (especially sizes) specified and normalized</li>
  <li>submit button composed</li>
  <li>edge cases applied</li>
  <li>Safari and Firefox tested and stylesheet values changed to reflect compromises (where possible)</li>
  <li>Internet Explorer 6 and 7 tested and supplied with property/value adjustments in a conditional stylesheet</li>
</ol>

<p>The process described immediately above starts with the broadest rules, and narrows in specificity until specific quirks of individual browsers are addressed&#x2026; much like the source order of the stylesheet itself.  However, the results don&#x2019;t correlate perfectly.  This happens because multiple rendering engines and the peculiarities of things like <code>float</code> context bring about unforeseen consequences when stirred into the proverbial mix, so the actual process requires more than a little doubling back, tweaking, and reconsideration.</p>

<h2 id="summary">Summary</h2>

<p>This article provides a thoughtful grounding in form styling and layout, but it is possible to go further. Difficulties posed by operating systems (the components of which are borrowed to create Web form controls) and differences between rendering engines add more challenge to the task set out before a stylist who needs to produce a Web form to specification. This article opens the door to experimentation with the many quirks associated with that task, and illuminates the way to achieving a fair level of mastery in one of the more difficult aspects of the Web development trade.</p>

<h2 id="exercises">Exercise questions</h2>

<ul>
  <li>What is the flow type of the form controls that accept user input, and what two characteristics make them remarkable with respect to layout?</li>
  <li>Which two attributes other than <code>value</code> and <code>disabled</code> manipulate form control settings in advance of user interaction, and to which elements do they apply?</li>
  <li>The demonstration document provides for required fields. Write at least one style rule that would, at a single stroke, change the appearance of a field that contains an instance of user input error or omission.</li>
  <li>Describe one use case each for the <code>select</code> element, the <code>checkbox</code> control, and the <code>radio</code> control. Substantiate each description with an explanation of the advantages your choice lends when compared to other possible choices.</li>
  <li>Using an online reference chosen by your instructor, find and briefly describe alternatives to <code>input type=&quot;submit&quot;</code>.</li>
  <li>Create a <code>select</code> element that allows selection of multiple <code>option</code>s by appending the <code>multiple=&quot;multiple&quot;</code> attribute/value pair. After examining the behavior of that element, explain why it&#x2019;s rarely encountered on production sites.</li>
</ul>

<h2 id="fractiontodecimalconversiontable">Table: fraction to decimal conversions</h2>

<p>In the following table, digits contained within brackets with an asterisk after them are infinitely repeated; for example 0.2(6*) is equivalent to 0.266666666666666… (6 repeats forever).</p>
<p>Values closest to zero are on the left side of the table, and progress toward one as the table is read from left to right.</p>

<table style="font-size:85%;margin-left:-80px;">
  <thead>
    <tr>
      <th>x</th>
      <th>1/x</th>
      <th>2/x</th>
      <th>3/x</th>
      <th>4/x</th>
      <th>5/x</th>
      <th>6/x</th>
      <th>7/x</th>
      <th>8/x</th>
      <th>9/x</th>
      <th>10/x</th>
      <th>11/x</th>
      <th>12/x</th>
      <th>13/x</th>
      <th>14/x</th>
      <th>15/x</th>
    </tr>
	</thead>
	<tbody>
		<tr>
			<th>2</th>
			<td>.5</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
		</tr>
		<tr>
			<th>3</th>
			<td>.(3*)</td>
			<td>.(6*)</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
		</tr>
		<tr>
			<th>4</th>
			<td>.25</td>
			<td>.5</td>
			<td>.75</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
		</tr>
		<tr>
			<th>5</th>
			<td>.2</td>
			<td>.4</td>
			<td>.6</td>
			<td>.8</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
		</tr>
		<tr>
			<th>6</th>
			<td>.1(6*)</td>
			<td>.(3*)</td>
			<td>.5</td>
			<td>.(6*)</td>
			<td>.8(3*)</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
		</tr>
		<tr>
			<th>7</th>
			<td>.(142857*)</td>
			<td>.(285714*)</td>
			<td>.(428571*)</td>
			<td>.(571428*)</td>
			<td>.(714285*)</td>
			<td>.(857142*)</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
		</tr>
		<tr>
			<th>8</th>
			<td>.125</td>
			<td>.25</td>
			<td>.375</td>
			<td>.5</td>
			<td>.625</td>
			<td>.75</td>
			<td>.875</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
		</tr>
		<tr>
			<th>9</th>
			<td>.(1*)</td>
			<td>.(2*)</td>
			<td>.(3*)</td>
			<td>.(4*)</td>
			<td>.(5*)</td>
			<td>.(6*)</td>
			<td>.(7*)</td>
			<td>.(8*)</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
		</tr>
		<tr>
			<th>10</th>
			<td>.1</td>
			<td>.2</td>
			<td>.3</td>
			<td>.4</td>
			<td>.5</td>
			<td>.6</td>
			<td>.7</td>
			<td>.8</td>
			<td>.9</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
		</tr>
		<tr>
			<th>11</th>
			<td>.(09*)</td>
			<td>.(18*)</td>
			<td>.(27*)</td>
			<td>.(36*)</td>
			<td>.(45*)</td>
			<td>.(54*)</td>
			<td>.(63*)</td>
			<td>.(72*)</td>
			<td>.(81*)</td>
			<td>.(90*)</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
		</tr>
		<tr>
			<th>12</th>
			<td>.08(3*)</td>
			<td>.1(6*)</td>
			<td>.25</td>
			<td>.(3*)</td>
			<td>.41(6*)</td>
			<td>.5</td>
			<td>.58(3*)</td>
			<td>.(6*)</td>
			<td>.75</td>
			<td>.8(3*)</td>
			<td>.91(6*)</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
		</tr>
		<tr>
			<th>13</th>
			<td>.(076923*)</td>
			<td>.(153846*)</td>
			<td>.(230769*)</td>
			<td>.(307692*)</td>
			<td>.(384615*)</td>
			<td>.(461538*)</td>
			<td>.(538461*)</td>
			<td>.(615383*)</td>
			<td>.(692307*)</td>
			<td>.(769230*)</td>
			<td>.(846153*)</td>
			<td>.(923076*)</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
		</tr>
		<tr>
			<th>14</th>
			<td>.0(714285*)</td>
			<td>.(142857*)</td>
			<td>.2(142857*)</td>
			<td>.(285714*)</td>
			<td>.3(571428*)</td>
			<td>.(428571*)</td>
			<td>.5</td>
			<td>.5(714285*)</td>
			<td>.6(428571*)</td>
			<td>.(714285*)</td>
			<td>.7(857142*)</td>
			<td>.(857142*)</td>
			<td>.9(285714*)</td>
			<td>-</td>
			<td>-</td>
		</tr>
		<tr>
			<th>15</th>
			<td>.0(6*)</td>
			<td>.1(3*)</td>
			<td>.2</td>
			<td>.2(6*)</td>
			<td>.(3*)</td>
			<td>.4</td>
			<td>.4(6*)</td>
			<td>.5(3*)</td>
			<td>.6</td>
			<td>.(6*)</td>
			<td>.7(3*)</td>
			<td>8</td>
			<td>.8(6*)</td>
			<td>.9(3*)</td>
			<td>-</td>
		</tr>
		<tr>
			<th>16</th>
			<td>.0625</td>
			<td>.125</td>
			<td>.1875</td>
			<td>.25</td>
			<td>.3125</td>
			<td>.375</td>
			<td>.4375</td>
			<td>.5</td>
			<td>.5625</td>
			<td>.625</td>
			<td>.6875</td>
			<td>.75</td>
			<td>.8125</td>
			<td>.875</td>
			<td>.9375</td>
		</tr>
	</tbody>
</table>



<h2 id="bibliography">Bibliography</h2>

<ul>
<li>Bos, Bert, et al. 2007. Cascading style sheets level 2 revision 1 (CSS 2.1) specification.
World Wide Web Consortium. <a href="http://www.w3.org/TR/2007/CR-CSS21-20070719">http://www.w3.org/TR/2007/CR-CSS21-20070719</a> <i>etc.</i> (accessed 28 May 2008).</li>
<li>Henick, Ben. 2006. 12 lessons for those afraid of CSS and standards.
A List Apart. <a href="http://www.alistapart.com/articles/12lessonsCSSandstandards">http://www.alistapart.com/articles/12lessonsCSSandstandards</a> (accessed 16 December 2008).</li>
<li>Horton, Sarah, and Lynch, Patrick. 2002. <a href="http://www.webstyleguide.com/">Web style guide</a>: basic principles for creating web sites, 2nd edition. New Haven, Conn.: Yale University Press.</li>
<li>Knott, Ron. 2008. The golden section ratio: phi.
Department of Mathematics, University of Surrey (UK). <a href="http://www.mcs.surrey.ac.uk/Personal/R.Knott/Fibonacci/phi.html">http://www.mcs.surrey.ac.uk/Personal/R.Knott/Fibonacci/phi.html</a> (accessed 18 December 1008).</li>
<li>Meyer, Eric. 2007. Formal weirdness.
Meyerweb.com. <a href="http://meyerweb.com/eric/thoughts/2007/05/15/formal-weirdness/">http://meyerweb.com/eric/thoughts/2007/05/15/formal-weirdness/</a> (accessed 17 December 2008).</li>
<li>Microsoft Corporation. msnbc.com.
<a href="http://msnbc.msn.com/">http://msnbc.msn.com/</a> (accessed 17 December 2008).</li>
<li>Raggett, Dave, <i lang="la">et al</i>. 1999. HTML 4.01 specification.
World Wide Web Consortium. <a href="http://www.w3.org/TR/1999/REC-html401-19991224">http://www.w3.org/TR/1999/REC-html401-19991224</a> <i lang="la">etc.</i> (accessed 30 June 2008).</li>
<li>Reynolds, Garr. 2005. From golden mean to &#x201C;rule of thirds.&#x201D;
Presentation Zen. <a href="http://www.presentationzen.com/presentationzen/2005/08/from_golden_mea.html">http://www.presentationzen.com/presentationzen/2005/08/from_golden_mea.html</a> (accessed 16 December 2008).</li>
<li>Santa Maria, Jason. 2008. Making modular layout systems.
24 Ways. <a href="http://24ways.org/2008/making-modular-layout-systems">http://24ways.org/2008/making-modular-layout-systems</a> (accessed 16 December 2008).</li>
<li>Wikpedia. 2008. Fahrner image replacement.
<a href="http://en.wikipedia.org/wiki/Fahrner_Image_Replacement">http://en.wikipedia.org/wiki/Fahrner_Image_Replacement</a> (accessed 19 December 2008).</li>
<li>Yahoo! Developer Network. 2008. Graded browser support.
<a href="http://developer.yahoo.com/yui/articles/gbs/">http://developer.yahoo.com/yui/articles/gbs/</a> (accessed 16 December 2008).</li>
</ul>

<ul class="seriesNav">
<li class="prev"><a href="http://dev.opera.com/articles/view/33-styling-tables/" rel="prev" title="link to the previous article in the series">Previous article—Styling tables</a></li>
<li class="next"><a href="http://dev.opera.com/articles/view/35-floats-and-clearing/" rel="next" title="link to the next article in the series">Next article—Floats and clearing</a></li>
<li><a href="http://dev.opera.com/articles/view/1-introduction-to-the-web-standards-cur/#toc" rel="index">Table of contents</a></li>
</ul>

<h2>About the author</h2>

<img alt="Picture of the article author Ben Henick" src="http://forum-test.oslo.osa/kirby/content/articles/162-34-form-design-layout-and-presentation-with-css/benhenick.jpeg" class="right" />

<p>Ben Henick has been building Web sites in one capacity or another since September 1995, when he took on his first Web project as an academic volunteer. Since then, most of his work has been done on a freelance basis.</p>

<p>Ben is a generalist; his skillset touches on nearly every aspect of site design and development, from CSS and HTML, to design and copywriting, to PHP/MySQL and JavaScript/Ajax.</p>

<p>He lives in Lawrence, Kansas, with three computers and zero television sets. You can read more about him and his work at <a href="http://www.henick.net/">henick.net</a>.</p>/code