<?php 
	header("Content-type:text/html;charset=utf-8");
	include('css_import.php');
	include('js_import.php');?>
<div class="container">
	<div class="col-xs-12">
		<div class="col-xs-3 sidebar">
			<ul class="nav nav-list sidenav affix">
				<li class="active"><a href="#overview"><i class="icon-chevron-right"></i> 概览</a></li>
				<li><a href="#modals"><i class="icon-chevron-right"></i>模态对话框（Modal）</a></li>
				<li><a href="#confirm"><i class="icon-chevron-right"></i> 确认对话框（Confirm）</a></li>
				<li><a href="#collapse"><i class="icon-chevron-right"></i> Collapse</a></li>
				<li><a href="#tab"><i class="icon-chevron-right"></i> Tab</a></li>
				<li><a href="#tooltip"><i class="icon-chevron-right"></i> Tooltip</a></li>
				<li><a href="#message"><i class="icon-chevron-right"></i> Message</a></li>
				<li><a href="#valid"><i class="icon-chevron-right"></i> Valid</a></li>
				<li><a href="#panes"><i class="icon-chevron-right"></i> Panes</a></li>
				<li><a href="#ajax"><i class="icon-chevron-right"></i> Ajax</a></li>
				<li><a href="#countdown"><i class="icon-chevron-right"></i> 倒计时（Countdown）</a></li>
			</ul>
		</div>
		<div class="col-xs-9">
				<section id="overview">
					<div class="page-header">
						<h1>Sco.js 概览</h1>
					</div>

					<h3>Why?</h3>
					<p>创造sco.js的起因是为了增强Bootstrap中现有的js组件，并且也为了满足我自己所做的项目的特定需求。
					对于一般的使用而言，Bootstrap中的js插件非常棒，但是，一旦你有深层次的或特定需求的时候，他们就无法满足了。
					大部分的Bootstrap js插件是（或者说，在我创造自己版本的插件前）无法扩展的，并且，我所面临的问题不仅仅是写一两行代码就能解决的。这并不是说Bootstrap和它的js组件很差劲！Bootstrap的确是一个非常好的快速开发框架，但是，你不能强求让他适应所有需求。在我的使用经历中，Bootstrap的确满足了大部分需求 ：） </p>
					<div class="alert alert-info">
						<strong>注意：</strong>
						Bootstrap中默认使用css过渡（transition）效果，这非常好！我所创建的插件中仅有几个使用到了过渡（transition）效果，而且我也正在容许的情况下尽量使用。
					</div>

					<h3>你的收获</h3>
					<p>sco.js中的插件可以和Bootstrap一起使用，也可以单独使用。而且，sco.js中还包含了Bootstrap中没有的插件。所有插件都进行了单元测试，并且有生产环境的使用案例。每个插件都可以通过<strong>data-attributes</strong> <code>data-trigger="pluginName"</code> 或者 <strong>js代码</strong>
					<code>var $modal = $.scojs_modal({...})</code>的方式使用。
					E每个插件都有“创建原因”（看下面具体说明） -- 它为了实现什么目的、它和Bootstrap中的插件有何不同、我为什么首先创建它。</p>
					<p>大部分的css都来源于Bootstrap。我也尽量遵循Bootstrap文档，遵循Bootstrap中的格式和约定，因此，你在使用的时候不会感觉和Bootstrap有很大不同。</p>
					<p>如果data属性可以出发某个插件，代码将是：<code>data-trigger="plugin name"</code>，以确保不和Bootstrap中的<code>data-toggle="plugin name"</code>产生冲突。
					这样你就可以同时或交叉使用Bootstrap和sco.js。</p>

					<h3>接下来？</h3>
					<ul>
						<li>Like mentioned in the note above, one of the priorities is to get css transition support working wherever possible.</li>
						<li>Carousel is coming too, based on panes.</li>
						<li>Ajax support for <a href="#panes">panes</a> (and automatically for <a href="#tab">tab</a> and carousel) - you should be able to load remote content into a pane or more slides into a carousel.</li>
						<li>Add predelay to <a href="#tooltip">tooltip</a> - for when you might want the tooltip to appear after a bit of delay.</li>
						<li><a href="#valid">form 校验</a>对ARIA的支持。</li>
						<li>如果足够有用，我将更新form校验，让他支持<code>data-*</code>属性，并且让他更易扩展，当然，现在还不着急。</li>
						<li>你有其他建议吗？</li>
					</ul>
				</section>

				<section id="modals">
					<div class="page-header">
						<h1>模态对话框（Modal） <small>sco.modal.js</small></h1>
					</div>

					<h3>What?</h3>
					<p>modal的主要用途是加载内容（通过ajax加载）并显示在一个覆盖层内，置于当前页面之上。当然，他还可以展示本地内容，这种使用方式不多。
					</p>

					<h3>Why?</h3>
					<p>由于Bootstrap中的modal不支持加载远程内容，因此就建造了这个插件。还有，我不希望在使用modal的时候将modal的内容/HTML放入当前页面，这样会让整个页面乱糟糟的。只须一个链接就能让Sco.js中的modal组件运作起来。</p>
					<p>例如，我们有一个旅馆的网站，每个房间都有一个订房表单，与其为每个页面放入相同的表单代码，还不如将这个表单单独做成一个页面，例如"my-booking-form.html"，然后每次调用modal时就用ajax加载 href="my-booking-form.html" ，这样就能让页面的主要内容干净且对seo友好。</p>


					<h3>依赖</h3>
					<p>The modal does not depend on other libraries (other than jQuery, of course). However, we recommend you load <a target="_blank" href="http://fgnass.github.com/spin.js">spin.js</a>.
					If spin.js is found, a spinning wheel is displayed during the loading of remote content.</p>

					<h3>案例</h3>
					<div class="bs-docs-example" style="padding-bottom: 24px;">
						<a data-trigger="modal" href="lipsum.html" data-title="Modal title" class="btn btn-primary btn-large">Launch demo modal</a>
					</div>
					<pre class="prettyprint linenums">
&lt;!-- Button to trigger modal -->
&lt;a data-trigger="modal" href="lipsum.html" data-title="Modal title" class="btn">Launch demo modal&lt;/a></pre>

					<p>You don't need to worry about providing any HTML structure to the modal, this is done automatically for you. The default markup is listed in the <a href="#modal_options">Options</a> section and the css comes from bootstrap. All you need to provide is the modal title and the url to the remote content. However, if you need to specify your own HTML markup check the <code>target</code> option.</p>

					<h2>用法</h2>
					<h3>通过data属性（data-api）</h3>
					<p>Look ma', no js code:</p>
					<pre class="prettyprint linenums">&lt;button type="button" data-trigger="modal">Launch modal&lt;/button></pre>
					<p>All plugin options are available to use as data attributes. The data-api usage is "live" - meaning that you don't have to rebind new elements. Every new element
					having a <code>data-trigger="modal"</code> attribute that is added to the dom after the initial load will work out of the box.</p>

					<h3>作为jquery插件使用</h3>
					<pre class="prettyprint linenums">$('#trigger').scojs_modal(options);</pre>
					or
					<pre class="prettyprint linenums">$('.modal_triggers').scojs_modal(options);</pre>
					<p>If the trigger element has <code>data-</code> attributes and you pass options as well, the data attributes overwrite the options with the same name.</p>
					<p>This part is quite different from bootstrap's implementation. In bootstrap, the selected element should be the modal (meaning the modal HTML should already exist in the dom).
					It also means the modal HTML cannot be reused by other modals (i.e. if you want more modals on the page, each has to have its own id/html code).<br>
					In our case, the selected element is the trigger of the modal (what you click on to launch the modal) and the modal is built based on the trigger's options.
					You definitely have the option to use different modals but, by default, the same modal HTML is reused by every modal instance on the page.
					This decision was made because we found out that we never wanted more modals appearing on the page at the same time. So reusing the same modal HTML for every triggered modal
					seemed quite logical.</p>

					<h3>访问插件的对象实例</h3>
					<pre class="prettyprint linenums">var modal = $.scojs_modal(options);</pre>
					<p>This gives you access to the created javascript object. Note that when you launch the modal this way, it's not shown by default. You'll have to call <code>modal.show()</code>
					at a later time to show the modal.</p>

					<h2 id="modal_options">参数</h2>
					<p>可以通过data属性或者JavaScript代码传递参数。对于data属性，将参数名添加到<code>data-</code>之后，例如<code>data-keyboard="1"</code>.</p>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 100px;">名称</th>
								<th style="width: 50px;">类型</th>
								<th style="width: 50px;">默认值</th>
								<th>说明</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>title</td>
								<td>string</td>
								<td>&amp;nbsp;</td>
								<td>The title of the modal.</td>
							</tr>
							<tr>
								<td>target</td>
								<td>string</td>
								<td>#modal</td>
								<td>The modal ID. If an HTML element with this ID already exists in the DOM, the modal content will be placed inside that, otherwise a standard HTML modal structure will be created
								automatically. The default structure is:
									<pre class="prettyprint linenums">
&lt;div class="modal fade" id="modal">
  &lt;div class="modal-header">
    &lt;a class="close" href="#" data-dismiss="modal">×&lt;/a>
    &lt;h3>&nbsp;&lt;/h3>
  &lt;/div>
  &lt;div class="inner">&lt;/div>
&lt;/div></pre>
									The modal is looking for an .inner element inside the target to place the content there so if using your own HTML markup, make sure you have an .inner element.
								</td>
							</tr>
							<tr>
								<td>remote</td>
								<td>string</td>
								<td></td>
								<td>The remote url to load content from. If the trigger element is an <code>&lt;a&gt;</code> and the data-api is used the <code>href</code> attribute is used for the remote option.
								If no href attribute exists or if it is empty or '#', the option is ignored.</td>
							</tr>
							<tr>
								<td>content</td>
								<td>string</td>
								<td></td>
								<td>Use this to define the modal content when you don't want to load the content remotely. Use either this option or the remote one but not both at once. You could use it like
									<pre class="prettyprint linenums">$('#trigger').scojs_modal({content: 'Lorem ipsum...'});</pre>
									or
									<pre class="prettyprint linenums">$('#trigger').scojs_modal({content: $('#other').html()});</pre>
									Note that if both the remote and content options are specified, the content is ignored. With the data-api, set the href
									to an empty string or '#' to have the remote option ignored.
								</td>
							</tr>
							<tr>
								<td>appendTo</td>
								<td>string</td>
								<td>body</td>
								<td>By default, the new modal and backdrop HTML are appended to the body element. Use this option to append them to some other element.</td>
							</tr>
							<tr>
								<td>cache</td>
								<td>boolean</td>
								<td>false</td>
								<td>Set this to true if you want to cache the first remote call output and reuse it on subsequent modal triggers. This could be useful for, say, a login modal, when the
								user triggers the modal, changes her mind, closes the modal then later on opens it again.</td>
							</tr>
							<tr>
								<td>keyboard</td>
								<td>boolean</td>
								<td>false</td>
								<td>Closes the modal when the escape key is pressed.</td>
							</tr>
							<tr>
								<td>nobackdrop</td>
								<td>boolean</td>
								<td>false</td>
								<td>Does not show the modal-backdrop element if set to true.</td>
							</tr>
							<tr>
								<td>cssclass</td>
								<td>string</td>
								<td></td>
								<td>The css class(es) to add to modal.</td>
							</tr>
							<tr>
								<td>width</td>
								<td>int</td>
								<td></td>
								<td>The modal width. This will be set inline on the .modal element. You should use the cssclass to add css that sets the width instead of this option.</td>
							</tr>
							<tr>
								<td>height</td>
								<td>int</td>
								<td></td>
								<td>The modal height. This will be set inline on the .modal element. You should use the cssclass to add css that sets the height instead of this option.</td>
							</tr>
							<tr>
								<td>left</td>
								<td>int</td>
								<td></td>
								<td>The modal left position. This will be set inline on the .modal element. You shouldn't normally have to use this option as the default css centers the modal on screen.
								Could be used for some sort of on-page help system/guides.
								</td>
							</tr>
							<tr>
								<td>top</td>
								<td>int</td>
								<td></td>
								<td>The modal top position. This will be set inline on the .modal element. You shouldn't normally have to use this option as the default css centers the modal on screen.
								Could be used for some sort of on-page help system/guides.
								</td>
							</tr>
							<tr>
								<td>onClose</td>
								<td>function</td>
								<td></td>
								<td>If set, this function is called after the modal is closed.
								</td>
							</tr>
						</tbody>
					</table>
					<h2 id="modal_methods">方法</h2>
					<h4>.scojs_modal(options)</h4>
					<pre class="prettyprint linenums">
$('#trigger').scojs_modal({
  title: 'Modals are cool',
  content: "No, they're not"
});</pre>
					<p>There are no other methods available in data-api or jQuery mode yet. The following methods are available in when you get access to the js object:</p>
					<h4>.show()</h4>
					<p>Shows the modal.</p>
					<pre class="prettyprint linenums">
var modal = $.scojs_modal({
  keyboard: true
});
modal.show();</pre>

					<h4>.close()</h4>
					<p>Closes the modal.</p>
					<pre class="prettyprint linenums">
var modal = $.scojs_modal({
  keyboard: true
});
modal.show();
modal.close();
</pre>

					<h4>.destroy()</h4>
					<p>Closes and destroys the modal, removes all modal HTML and events from the DOM.</p>
					<pre class="prettyprint linenums">
var modal = $.scojs_modal({
  keyboard: true
});
modal.show();
modal.destroy();
</pre>
				</section>


				<section id="confirm">
					<div class="page-header">
						<h1>Confirm <small>sco.confirm.js</small></h1>
					</div>

					<h3>What?</h3>
					<p>A specialised modal that has a yes/no button in the footer. The yes is attached to some action, the no dismisses the modal without doing anything else.
					Basically a glorified alert().</p>

					<h3>Why?</h3>
					<p>We wanted an easy way to make the user confirm some action like deleting something from their profiles.</p>

					<h3>依赖</h3>
					<p>The confirm plugin depends on the <a href="#modals">modal</a>. Make sure you load both when you want to use confirm.</p>

					<h3>案例</h3>
					<div class="bs-docs-example" style="padding-bottom: 24px;">
						<a data-trigger="confirm" href="/delete/me" class="btn btn-primary btn-large">Launch demo confirm</a>
						<p class="message">(Note that if you click on yes on the confirmation modal, you will be taken to a non-existing page)</p>
					</div>
					<pre class="prettyprint linenums">
&lt;!-- Button to trigger confirm -->
&lt;a data-trigger="confirm" href="/delete/me" class="btn">Launch demo confirm&lt;/a></pre>

					<h2>用法</h2>
					<h3>通过data属性（data-api）</h3>
					<pre class="prettyprint linenums">&lt;a href="/link-to-go-to/when-user-presses-yes" data-trigger="confirm">Launch confirm&lt;/button></pre>
					<p>All modal options are available for confirm as well though some might not make much sense (like loading remote content). There are some
					extra options available for confirm, see the options below.</p>

					<h3>作为jquery插件使用</h3>
					<pre class="prettyprint linenums">$('#confirm_trigger').scojs_confirm(options);</pre>
					<p>Like with the modal, you call scojs_confirm() on the trigger, not on the modal element itself. And, if <code>data-</code> attributes exist, they
					overwrite any general options you pass to the plugin.</p>

					<h3>访问插件的对象实例</h3>
					<pre class="prettyprint linenums">var confirm = $.scojs_confirm(options);</pre>
					<p>This gives you access to the created javascript object. Note that when you launch the confirm this way, it's not shown by default. You'll have to call <code>confirm.show()</code>
					at a later time to show the confirm modal.</p>

					<h2>参数</h2>
					<p>可以通过data属性或者JavaScript代码传递参数。对于data属性，将参数名添加到<code>data-</code>之后，例如<code>data-keyboard="1"</code>.</p>
					<p>All <a href="#modal_options">modal options</a> are available for confirm as well. Note, however, that the default confirm modal doesn't have a title so setting <code>title</code>
					has no effect. You can, of course, have your own confirm modal with a title in which case this option will work as expected.
					There are also some modal options that don't make much sense to be set for confirm like <code>remote</code> and <code>cache</code> but you're free to use them if you need them.</p>
					<p>There are some extra options available for confirm or options that have a different default than the modal. See below:</p>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 100px;">名称</th>
								<th style="width: 50px;">类型</th>
								<th style="width: 50px;">默认值</th>
								<th>说明</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>content</td>
								<td>string</td>
								<td>Are you sure you want to delete :title?</td>
								<td>The content of the confirm modal. ":title" is replaced by the <code>title</code> or <code>data-title</code> attribute/option if any of these exist
								or by the word "this", making the content "Are you sure you want to delete this?" or "Are you sure you want to delete Foo?".
								</td>
							</tr>
							<tr>
								<td>cssclass</td>
								<td>string</td>
								<td>confirm_modal</td>
								<td>This class is added by default to all confirm modals.</td>
							</tr>
							<tr>
								<td>target</td>
								<td>string</td>
								<td>#confirm_modal</td>
								<td>The confirm modal ID. If an HTML element with this ID already exists in the DOM, it will be used, otherwise a standard HTML confirm modal structure will be created
								automatically. The default structure is:
									<pre class="prettyprint linenums">
&lt;div class="modal fade confirm_modal" id="confirm_modal">
  &lt;div class="modal-body inner">&lt;/div>
  &lt;div class="modal-footer">
    &lt;a class="btn cancel" href="#" data-dismiss="modal">cancel&lt;/a>
    &lt;a href="#" class="btn btn-danger" data-action="1">yes&lt;/a>
  &lt;/div>
&lt;/div></pre>
								</td>
							</tr>
							<tr>
								<td>action</td>
								<td>string / function</td>
								<td></td>
								<td>This option decides what happens when you click the yes button. In data-api, if a <code>data-action="foo"</code> attribute is found, we check if foo is a function
									and if it is, that function is assigned as the 'yes' function (will be run when clicking on the yes button). If foo is not a function then it is assumed to be an url.
									If no <code>data-action</code> attribute is found, the action option is set to the href of the trigger so when you click on yes
									you will be taken to that url.
									<p>For example, clicking on one of the following:</p>
<pre class="prettyprint linenums">&lt;a data-trigger="confirm" href="/delete/me" class="btn">Delete&lt;/a>
&lt;button class="btn" data-action="/delete/me" data-trigger="confirm">Delete&lt;/button></pre>
									would show the confirm modal and when clicking on the yes button there, you'd be taken to <code>/delete/me</code>.
									<p>Note that when both <code>href</code> and <code>data-action</code> are found, href is ignored.</p>
									<p>When this option is a function, clicking on the yes button would execute that function (in the context of the confirm modal object) and then close the modal.</p>
								</td>
							</tr>
						</tbody>
					</table>

					<h2>方法</h2>
					<h4>.scojs_confirm(options)</h4>
					<pre class="prettyprint linenums">
$('#trigger').scojs_confirm({
  content: "Ain't that cute?",
  action: "http://google.com"
});</pre>
					<pre class="prettyprint linenums">
var confirm = $.scojs_confirm({
  content: "Oh, noes, you really want to delete me?",
  action: function() {
    this.close();
  }
});
confirm.show();</pre>
					<p>All <a href="#modal_methods">modal methods</a> are available for the confirm as well.</p>
				</section>


				<section id="collapse">
					<div class="page-header">
						<h1>Collapse <small>sco.collapse.js</small></h1>
					</div>

					<h3>What?</h3>
					<p>Accordions or show/hide togglers.</p>

					<h3>Why?</h3>
					<p>So much markup in bootstrap for their collapse component! And IDs. I hate IDs! While IDs give you a great degree of freedom in what to target (as in I want this button to collapse this far away block across the page),
					most of the time it's not how an accordion works. You usually want to click on a menu link and expand the block under/above that link. So I made this collapse plugin to address the said issues.</p>

					<h3>依赖</h3>
					<p>The collapse does not depend on other libraries (other than jQuery, of course).</p>

					<h3>案例</h3>
					<p>In its most basic form, the collapser plugin is nothing more than a simple on/off toggler for another block element.
					All you need to get started is a trigger with a <code>data-trigger="collapse"</code> attribute and a div inmediately following the trigger with a class of <code>.collapsible</code>. You will probably want that div to be set to display:none (eg. via the bootstrap helper class <code>.hide</code> or with <code>style="display:none"</code>).
					</p>
					<div class="bs-docs-example" style="padding-bottom: 24px;">
						<a href="#" data-trigger="collapse">Click for default behaviour</a>
						<div class="collapsible hide">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam lacinia hendrerit purus, in convallis quam ultricies vel. Sed a dui tellus, ut lacinia felis. Duis eget sapien ut dui congue mattis.
						</div>
					</div>
					<pre class="prettyprint linenums">
&lt;a href="#" data-trigger="collapse">Click for default behaviour&lt;/a>
&lt;div class="collapsible hide">
  Lorem ipsum...
&lt;/div></pre>

					<p>更多案例：</p>
					<div class="bs-docs-example" style="padding-bottom: 24px;" id="second-collapse-example">
						<ul class="nav nav-list">
							<li>
								<a href="#" data-trigger="collapse">Click for default behaviour</a>
								<div class="collapsible hide">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam lacinia hendrerit purus, in convallis quam ultricies vel. Sed a dui tellus, ut lacinia felis. Duis eget sapien ut dui congue mattis.
								</div>
							</li>
							<li>
								<a href="#" data-trigger="collapse" data-target="#collapse_test">Click me too - I am using an id</a>
								<div id="collapse_test" class="hide">
									The quick brown fox jumps over the lazy dog.
								</div>
							</li>
							<li>
								<a href="#" data-trigger="collapse" data-target="#second-collapse-example .hide">Toggle all at once</a>
							</li>
						</ul>
					</div>

					<p>Let's spice things up a bit: the accordion behaviour. In this mode, we need to tell each trigger what html element is the parent for the whole accordion:</p>
					<div class="bs-docs-example" style="padding-bottom: 24px;">
						<div class="sidenav">
							<ul class="nav nav-list">
								<li>
									<a href="#" data-trigger="collapse" data-parent=".sidenav" class="active">Menu 1</a>
									<div class="collapsible">
										The quick brown fox jumps over the lazy dog.
									</div>
								</li>
								<li>
									<a href="#" data-trigger="collapse" data-parent=".sidenav">Menu 2</a>
									<div class="collapsible" style="display: none">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam lacinia hendrerit purus, in convallis quam ultricies vel.
									</div>
								</li>
							</ul>
						</div>
					</div>
					<pre class="prettyprint linenums">
&lt;div class="sidenav">
  &lt;a href="#" data-trigger="collapse" data-parent=".sidenav" class="active">Menu 1&lt;/a>
  &lt;div class="collapsible">
    The quick brown fox jumps over the lazy dog.
  &lt;/div>
  &lt;a href="#" data-trigger="collapse" data-parent=".sidenav">Menu 2&lt;/a>
  &lt;div class="collapsible" style="display: none">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
  &lt;/div>
&lt;/div></pre>

					<p>We can make this even more interesting by adding a "show more / show less" toggle:</p>
					<div class="bs-docs-example" style="padding-bottom: 24px;">
						<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
						<div class="collapsible hide">Etiam lacinia hendrerit purus, in convallis quam ultricies vel. Sed a dui tellus, ut lacinia felis. Duis eget sapien ut dui congue mattis.</div>
						<a href="#" class="show_more_example">show more</a>
						<div>Q: What does the quick brown fox do?</div>
						<div class="collapsible hide">A: The quick brown fox jumps over the lazy dog.</div>
						<a href="#" class="show_more_example">show more</a>
						<script>
							$(document).on('click', '.show_more_example', function(e) {
								$(this).scojs_collapse({
									triggerHtml: {on: 'show less', off: 'show more'}
									,mode: 'prev'
								});
								return false;
							});
						</script>
					</div>
					<pre class="prettyprint linenums">
&lt;div>Lorem ipsum...&lt;/div>
&lt;div class="collapsible hide">Etiam lacinia...&lt;/div>
&lt;a href="#" class="show_more_example">show more&lt;/a>

&lt;div>Q: What does the quick brown fox do?&lt;/div>
&lt;div class="collapsible hide">A: The quick brown fox jumps over the lazy dog.&lt;/div>
&lt;a href="#" class="show_more_example">show more&lt;/a>
&lt;script>
  $(document).on('click', '.show_more_example', function(e) {
    $(this).scojs_collapse({
      triggerHtml: {on: 'show less', off: 'show more'}
      ,mode: 'prev'
    });
    return false;
  });
&lt;/script></pre>

					<h2>用法</h2>
					<h3>通过data属性（data-api）</h3>
					<pre class="prettyprint linenums">&lt;button data-trigger="collapse" class="btn">Click me&lt;/button></pre>
					<p>The data-api usage is "live" - meaning that you don't have to rebind new elements. Every new element
					having a <code>data-trigger="collapse"</code> attribute that is added to the dom after the initial load will work out of the box.</p>

					<h3>作为jquery插件使用</h3>
					<pre class="prettyprint linenums">$('#collapse_trigger').scojs_collapse(options);</pre>
					<p>If <code>data-</code> attributes exist, they overwrite any general options you pass to the plugin.</p>
					<p>When you call the plugin this way, all it does is toggle the target. To toggle it back you'd call the plugin again. However, it's best used inside a click event (or hover/etc) like this:</p>
					<pre class="prettyprint linenums">
&lt;script>
  $(document).on('click', '.collapse_triggers', function(e) {
    $(this).scojs_collapse(options);
    return false;
  });
&lt;/script></pre>

					<h3>访问插件的对象实例</h3>
					<pre class="prettyprint linenums">var collapse = $.scojs_collapse(options);</pre>
					<p>This gives you access to the created javascript object. Note that when you launch the collapse this way, it doesn't toggle the target by default. You'll have to call <code>collapse.toggle()</code>
					at a later time, as many times as you want, to toggle the target on/off.</p>

					<h2>参数</h2>
					<p>可以通过data属性或者JavaScript代码传递参数。对于data属性，将参数名添加到<code>data-</code>之后，例如<code>data-parent=".foo"</code>.</p>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 100px;">名称</th>
								<th style="width: 50px;">类型</th>
								<th style="width: 50px;">默认值</th>
								<th>说明</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>parent</td>
								<td>string</td>
								<td></td>
								<td>Using this option activates the accordion behaviour. It should be a jQuery selector for the element wrapping the accordion.</td>
							</tr>
							<tr>
								<td>target</td>
								<td>string</td>
								<td></td>
								<td>Use this option to specify the target element to collapse. It should be a jQuery selector for the element you want to collapse.
								Normally it's not needed as the plugin can figure out which element to collapse by itself.</td>
							</tr>
							<tr>
								<td>activeTriggerClass</td>
								<td>string</td>
								<td></td>
								<td>Class to add to the trigger in active state (when the target element is visible).</td>
							</tr>
							<tr>
								<td>triggerHtml</td>
								<td>object</td>
								<td></td>
								<td>If not null, this should be a hash like <code>{off: 'more', on: 'less'}</code>. This text is set on the trigger.
								When target is not visible, the <code>off</code> text is shown on the trigger, otherwise the <code>on</code> text is shown.</td>
							</tr>
							<tr>
								<td>mode</td>
								<td>string</td>
								<td>next</td>
								<td>Can be either <code>next</code> or <code>prev</code>. Determines where the element to collapse is to be found in relation to the trigger. <code>next</code> means the trigger comes before
								the collapsible element while <code>prev</code> means trigger is after the element. The plugin is actually searching for a prev/next sibling of the trigger by using the
								<a target="_blank" href="http://api.jquery.com/prev">prev()</a>, <a target="_blank" href="http://api.jquery.com/next">next()</a> jQuery functions.</td>
							</tr>
							<tr>
								<td>collapseSelector</td>
								<td>string</td>
								<td>.collapsible</td>
								<td>The selector for the target element to be toggled.</td>
							</tr>
							<tr>
								<td>triggerSelector</td>
								<td>string</td>
								<td>[data-trigger="collapse"]</td>
								<td>This is used by accordion to find all triggers.</td>
							</tr>
							<tr>
								<td>ease</td>
								<td>string</td>
								<td>slide</td>
								<td>The effect to use to show/hide the target element. Must be an effect that supports the toggle jQuery functions (like toggleSlide(), toggleFade() or simply toggle()).</td>
							</tr>
						</tbody>
					</table>

					<h2>方法</h2>
					<h4>.scojs_collapse(options)</h4>
					<pre class="prettyprint linenums">
$('#trigger').scojs_collapse({
  parent: '#sidebar',
  mode: 'prev'
});</pre>
					<p>There are no other methods available in data-api or jQuery mode yet. The following methods are available when you get access to the js object:</p>
					<h4>.toggle()</h4>
					<p>Toggles the target element.</p>
					<pre class="prettyprint linenums">
var collapse = $.scojs_collapse();
collapse.toggle();</pre>
				</section>


				<section id="tab">
					<div class="page-header">
						<h1>Tab <small>sco.tab.js</small></h1>
					</div>

					<h3>What?</h3>
					<p>Tab functionality for your pages.</p>

					<h3>Why?</h3>
					<p>Like with the other plugins that already exist in bootstrap that I chose to rewrite, my main problem with bootstrap tabs is the complexity of the markup required and the heavy use of IDs. Sco.js tabs are simpler, have some sane defaults but the simplicity comes with a price: it doesn't support dropdown tabs for example.
					If you need the extra complexity, by all means, use bootstrap tabs.</p>

					<h3>依赖</h3>
					<p><a href="#panes">Panes</a> - because it's the core of the tabs and carousel. If you want history support you should also include <a target="_blank" href="http://www.asual.com/jquery/address">jQuery Address</a>. See below for how to use it.</p>

					<h3>案例</h3>
					<p>To start using the tab plugin you need an <code>&lt;ul data-trigger="tab"></code> for the tab headers and a <code>&lt;div class="pane-wrapper"></code> immediately following the ul for the tab content. There should be as many li's in the ul as children elements in the .pane-wrapper div. A click on the first tab header would select the first .pane-wrapper child, a click on the nth tab header would select the nth child.</p>
					<p>The links in the tab headers don't need a specific href attribute, unless you want history support:</p>

					<div class="bs-docs-example" style="padding-bottom: 24px;">
						<ul class="nav nav-tabs" data-trigger="tab">
							<li><a href="#">Tab 1</a></li>
							<li><a href="#">Tab 2</a></li>
							<li><a href="#">Tab 3</a></li>
							<li><a href="#">Tab 4</a></li>
						</ul>
						<div class="pane-wrapper">
							<div>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque posuere hendrerit bibendum. Maecenas vel velit quis quam suscipit eleifend scelerisque vitae nisi. Sed eget dui sem, vel pellentesque nibh. Curabitur ut ligula mauris, non suscipit felis. Phasellus venenatis, erat vitae porta mattis, nunc nunc consectetur nibh, et venenatis tellus arcu at augue. Aliquam ultricies egestas diam, at posuere lorem semper ac.</p>
							</div>
							<div>
								<p>Phasellus at neque mauris. Integer eu massa consectetur lectus posuere fermentum. Mauris vel ante eu purus tempus suscipit. Maecenas rutrum lacus eget odio tempus ac consequat mauris aliquet. Aenean vitae tortor vitae eros accumsan pulvinar eu eget massa. Suspendisse in ligula nec nulla tempus pellentesque. Pellentesque pulvinar lacus ac tortor dictum sit amet molestie dolor mollis.</p>
							</div>
							<div>
								<p>Duis facilisis ligula sed libero pharetra fermentum. Fusce at odio sapien, vitae eleifend mauris. Nullam vitae nunc non purus aliquet blandit at nec ipsum. Pellentesque at nisi consequat magna venenatis varius non eget nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut facilisis vestibulum risus, id mattis erat condimentum iaculis. Nunc luctus scelerisque arcu a lacinia. Nulla quis magna mauris, id dignissim risus. Mauris neque urna, sollicitudin vitae accumsan a, tincidunt a ipsum.</p>
							</div>
							<div>
								<p>Praesent mollis scelerisque aliquam. Proin dui lacus, consequat sed pretium sed, vehicula a orci. Duis tristique eros lorem, quis consectetur sapien. Nulla facilisi. Vestibulum luctus, lorem vitae ullamcorper mattis, erat erat venenatis mi, non sodales urna tortor sit amet purus. Pellentesque ut eros a arcu consequat volutpat ac id purus. Integer feugiat accumsan justo, sed ultricies urna ultricies eu. Maecenas commodo adipiscing nulla in feugiat. Nam eu est nunc.</p>
							</div>
						</div>
					</div>
					<pre class="prettyprint linenums">
&lt;ul class="nav nav-tabs" data-trigger="tab">
  &lt;li>&lt;a href="#">Tab 1&lt;/a>&lt;/li>
  &lt;li>&lt;a href="#">Tab 2&lt;/a>&lt;/li>
  &lt;li>&lt;a href="#">Tab 3&lt;/a>&lt;/li>
  &lt;li>&lt;a href="#">Tab 4&lt;/a>&lt;/li>
&lt;/ul>
&lt;div class="pane-wrapper">
  &lt;div>...&lt;/div>
  &lt;div>...&lt;/div>
  &lt;div>...&lt;/div>
  &lt;div>...&lt;/div>
&lt;/div></pre>

					<h2>Browser history support</h2>
					<p>To enable history support for tabs make sure you load <a target="_blank" href="http://www.asual.com/jquery/address">jQuery Address</a> and that the links in your tab headers have anchor hrefs (e.g <code>&lt;a href="#foo">Tab 1&lt;/a></code>).<br>
						However, the hrefs must <strong>NOT</strong> point to any element on the page (there should be no element with that ID on the page).
						The history support is bidirectional:
					</p>
					<ul>
						<li>when you click on a tab header that has an anchor href the hash gets added to the current url. This is the easy direction :)</li>
						<li>when you add the hash of a tab header to the url, the tab switches to that pane</li>
					</ul>
					<p>If there's an element that has the same ID as one of your hrefs, the tabs will still function properly but the page will "jump" to that element, as anchors are supposed to work in browser.</p>
					<div class="bs-docs-example" style="padding-bottom: 24px;">
						<ul class="nav nav-tabs" data-trigger="tab" data-easing="slide">
							<li><a href="#tab1">Tab 1</a></li>
							<li><a href="#tab2">Tab 2</a></li>
							<li><a href="#tab3">Tab 3</a></li>
							<li><a href="#modals">Tab with existing ID on page</a></li>
						</ul>
						<div class="pane-wrapper">
							<div>Tab 1 content</div>
							<div>Tab 2 content</div>
							<div>Tab 3 content</div>
							<div>Tab 4 content</div>
						</div>
					</div>
					<p>Click on the tabs above and see how the hash is added to the page url (which is normal browser behaviour) and try adding #tab1 or #tab2 or #tab3 to this page url manually and see how the tabs change. You can also click on the last tab header - the proper pane will be selected but the page will jump up to modals.</p>

					<h2>用法</h2>
					<h3>通过data属性（data-api）</h3>
					<p>See the examples above for how you can use this with the data-api. You need to add <code>data-trigger="tab"</code> to the element wrapping the tab headers.</p>
					<p>The data-api usage is <strong>NOT</strong> "live", unfortunately. If you add elements to the DOM having a <code>data-trigger="tab"</code> attribute, you will have to also bind that new element yourself using javascript.</p>

					<h3>作为jquery插件使用</h3>
					<pre class="prettyprint linenums">$('#mytabs').scojs_tab(options);</pre>
					<p>If the #mytabs element has <code>data-</code> attributes and you pass options as well, the data attributes overwrite the options with the same name.</p>

					<h3>访问插件的对象实例</h3>
					<pre class="prettyprint linenums">var tab = $.scojs_tab('#mytabs', options);</pre>

					<h2>参数</h2>
					<p>可以通过data属性或者JavaScript代码传递参数。对于data属性，将参数名添加到<code>data-</code>之后，例如<code>data-content="#foo"</code>.</p>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 100px;">名称</th>
								<th style="width: 50px;">类型</th>
								<th style="width: 50px;">默认值</th>
								<th>说明</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>content</td>
								<td>string</td>
								<td></td>
								<td>(required) The selector for the pane wrapper element. The pane wrapper element should have a <code>.pane-wrapper</code> class.</td>
							</tr>
							<tr>
								<td>active</td>
								<td>integer</td>
								<td>0</td>
								<td>The index of the active tab (0 based).</td>
							</tr>
							<tr>
								<td>mode</td>
								<td>string</td>
								<td>next</td>
								<td>Can be either <code>next</code> or <code>prev</code>. Determines where .pane-wrapper is to be found in relation to the headers ul. <code>next</code> means .pane-wrapper comes after (under)
								the headers while <code>prev</code> means .pane-wrapper is before (above) the element. The plugin is actually searching for a prev/next sibling of the header ul by using the
								<a target="_blank" href="http://api.jquery.com/prev">prev()</a>, <a target="_blank" href="http://api.jquery.com/next">next()</a> jQuery functions.</td>
							</tr>
							<tr>
								<td>easing</td>
								<td>string</td>
								<td></td>
								<td>The css class to add to the wrapper. You could add the class yourself in html without specifying this option to the plugin but I might implement a javascript fallback for fade/slide so it's better
								that the plugin is aware of this. At the moment you can use <code>xfade</code>, <code>slide</code> and <code>flip</code>. You can, of course, define your own css-based transition effects, in which case you'd specify here the name of your css class.<br>
								For example, you could use easing: 'flip-vertical', copy all styles that start with .pane-wrapper.flip in scojs.css, replace .flip with .flip-vertical there and rotateY with rotateX.</td>
							</tr>
							<tr>
								<td>onBeforeSelect</td>
								<td>function</td>
								<td></td>
								<td>The callback to run just before selecting a new tab. If your callback returns false, the new tab will not be selected. Inside the function, <code>this</code> refers to the tab object so you can access all other tab properties (like this.options, etc).</td>
							</tr>
						</tbody>
					</table>

					<h2>方法</h2>
					<h4>.select(index)</h4>
					<p>Select the index-th element (0-based).</p>
					<pre class="prettyprint linenums">
var $tab = $.scojs_tab('#foo');
$tab.select(1);</pre>
				</section>


				<section id="tooltip">
					<div class="page-header">
						<h1>Tooltip <small>sco.tooltip.js</small></h1>
					</div>

					<h3>What?</h3>
					<p id="tooltip_element">Y'know...tooltips. The kind of dialog baloon that usually appears on hover over stuff.</p>

					<h3>Why?</h3>
					<p>While other tooltip plugins focus on pixel perfect positioning, the main focus of Sco.js tooltips plugin is to keep the actual tooltip in the viewport at all times. It's not so much about perfect positioning but
					about making sure that it's fully shown in the view area when you hover over elements with tooltips, even over those that are positioned near edges of the viewport.</p>

					<h3>依赖</h3>
					<p>jQuery.</p>

					<h3>案例</h3>
					<div class="bs-docs-example" style="padding-bottom: 24px;">
						<a href="#" data-trigger="tooltip" data-content="Lorem ipsum dolor">Hover me</a>
					</div>
					<pre class="prettyprint linenums">&lt;a href="#" data-trigger="tooltip" data-content="Lorem ipsum dolor">Hover me&lt;/a></pre>
					<p>Scroll the page up till the example link above is at the very top of the page and hover over the link again - you will see the tooltip appearing below the link. Try the same with left/right/bottom - the tooltip will reposition itself
					to stay on page all the time.</p>

					<h2>用法</h2>
					<h3>通过data属性（data-api）</h3>
					<pre class="prettyprint linenums">&lt;div data-trigger="tooltip" data-content-elem="#tooltip_element">Hover me&lt;/div></pre>
					<p>The data-api usage is "live" - meaning that you don't have to rebind new elements. Every new element
					having a <code>data-trigger="tooltip"</code> attribute that is added to the dom after the initial load will work out of the box.</p>

					<h3>作为jquery插件使用</h3>
					<pre class="prettyprint linenums">$('.tooltips').scojs_tooltip(options);</pre>
					<p>If the trigger element has <code>data-</code> attributes and you pass options as well, the data attributes overwrite the options with the same name.</p>

					<h3>访问插件的对象实例</h3>
					<pre class="prettyprint linenums">var tooltip = $.scojs_tooltip('#trigger', options);</pre>
					<p>This gives you access to the created javascript object. Note that when you launch the tooltip this way, it's not shown by default. You'll have to call <code>tooltip.show()</code>
					at a later time to show the tooltip.</p>

					<h2>参数</h2>
					<p>可以通过data属性或者JavaScript代码传递参数。对于data属性，将参数名添加到<code>data-</code>之后，例如<code>data-content="my content"</code>.</p>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 100px;">名称</th>
								<th style="width: 50px;">类型</th>
								<th style="width: 50px;">默认值</th>
								<th>说明</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>content</td>
								<td>string</td>
								<td></td>
								<td>The content that should be shown in the tooltip. <br><code>content</code>, <code>contentAttr</code>, <code>contentElem</code> are mutually exclusive, use only one of them.</td>
							</tr>
							<tr>
								<td>contentAttr</td>
								<td>string</td>
								<td></td>
								<td>Get the content from the trigger attribute specified by this option. <br><code>content</code>, <code>contentAttr</code>, <code>contentElem</code> are mutually exclusive, use only one of them.</td>
							</tr>
							<tr>
								<td>contentElem</td>
								<td>string</td>
								<td></td>
								<td>Get the content from some other element on the page (this is the selector for that element) <code>$('.tooltip').scojs_tooltip({contentElem: '#foo'})</code>. <br><code>content</code>, <code>contentAttr</code>, <code>contentElem</code> are mutually exclusive, use only one of them.</td>
							</tr>
							<tr>
								<td>hoverable</td>
								<td>bool</td>
								<td>true</td>
								<td>If this option is set to true, hovering over the tooltip will keep it open. When set to false, only hover over the trigger will keep the tooltip open.</td>
							</tr>
							<tr>
								<td>delay</td>
								<td>int</td>
								<td>200</td>
								<td>The time in milliseconds after the mouse leaves the trigger element before the tooltip is hidden.</td>
							</tr>
							<tr>
								<td>cssclass</td>
								<td>string</td>
								<td></td>
								<td>If set, this class is added to the tooltip so you can have your own, custom, tooltip style (<code>.tooltip.myclass</code>).</td>
							</tr>
							<tr>
								<td>position</td>
								<td>string</td>
								<td>n</td>
								<td>Where should the tooltip be shown in relation to the trigger. Possible values are:
									<ul>
										<li><code>e</code> to the left of the trigger</li>
										<li><code>w</code> to the right of the trigger</li>
										<li><code>n</code> above the trigger</li>
										<li><code>s</code> below the trigger</li>
										<li><code>ne</code> top right corner of the trigger</li>
										<li><code>nw</code> top left corner of the trigger</li>
										<li><code>se</code> bottom right corner of the trigger</li>
										<li><code>sw</code> bottom left corner of the trigger</li>
										<li><code>center</code> centered over the trigger</li>
									</ul>
								</td>
							</tr>
							<tr>
								<td>autoclose</td>
								<td>bool</td>
								<td>true</td>
								<td>
									When true, the tooltip behaves like any normal tooltip: it's shown on mouse over trigger and hidden on mouse out. When false, the tooltip is shown on mouse over but not hidden anymore on mouse out. You will have to close it either by javascript or have a button/link with a <code>data-dismiss="tooltip"</code> attribute which will close the tooltip on click.
									<br>Example:
									<div>
										<a href="#" data-trigger="tooltip" data-autoclose="0" data-content-elem="#tooltip_target1">See the wonder</a>
										<div id="tooltip_target1" class="hide">This is such an important message that you need to click to close <button class="button" data-dismiss="tooltip">close</button></div>
									</div>
								</td>
							</tr>
							<tr>
								<td>target</td>
								<td>string</td>
								<td></td>
								<td>
									When this is set it should be a selector for some other element on the page. The tooltip will be shown over that element instead of over the trigger.
									<br>Example:
									<div>
										<a href="#" data-trigger="tooltip" data-target="#tooltip_target2" title="haha" data-content="wow, this is cool!">I am the trigger, hover me</a>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<a href="#" id="tooltip_target2">I am the target, hover won't help</a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>

					<h2>方法</h2>
					<h4>.scojs_tooltip(options)</h4>
					<pre class="prettyprint linenums">
$('#trigger').scojs_tooltip({
  content: "Tooltip content"
  ,cssclass: 'pretty'
  ,delay: 1000
});</pre>
					<p>The following methods are available when you get access to the js object:</p>
					<h4>.show()</h4>
					<p>Shows the tooltip straight away.</p>
					<pre class="prettyprint linenums">
var tooltip = $.scojs_tooltip('#trigger', {
  target: '#foo'
  ,content: 'tooltip content'
});
tooltip.show();</pre>

					<h4>.hide()</h4>
					<p>Hides the tooltip straight away.</p>
					<pre class="prettyprint linenums">
var tooltip = $.scojs_tooltip('#trigger', {
  target: '#foo'
  ,content: 'tooltip content'
});
tooltip.show();
tooltip.hide();</pre>

					<h4>.do_mouseenter()</h4>
					<p>See .do_mouseleave()</p>

					<h4>.do_mouseleave()</h4>
					<p>Useful when you have the <code>delay</code> option set and you don't want to hide the tooltip right away but instead hide it after the set delay. Basically, this simulates the mouse leaving the trigger. Also, this gives a chance to the user to hover over the trigger again and keep the tooltip open some more.</p>
					<pre class="prettyprint linenums">
var tooltip = $.scojs_tooltip('#trigger', {
  ,delay: 1000
});
tooltip.show();
tooltip.do_mouseleave();  // hides after 1000 seconds</pre>
				</section>


				<section id="message">
					<div class="page-header">
						<h1>Message <small>sco.message.js</small></h1>
					</div>

					<h3>What?</h3>
					<p>This is a "flash message" - a message that appears at the top of the page and disappears after a few seconds. It can be an info or an error message.</p>

					<h3>Why?</h3>
					<p>Useful after some user action (like submitting a form for example) to let them know your app processed the action ok or there was an error.</p>

					<h3>依赖</h3>
					<p>jQuery.</p>

					<h3>案例</h3>
					<div class="bs-docs-example" style="padding-bottom: 24px;">
						<a id="message_trigger_ok" href="#">Click to see the info message</a>
						<br>
						<a id="message_trigger_err" href="#">Click to see the error message</a>
						<script>
							$('#message_trigger_ok').on('click', function(e) {
								e.preventDefault();
								$.scojs_message('This is an info message', $.scojs_message.TYPE_OK);
							});
							$('#message_trigger_err').on('click', function(e) {
								e.preventDefault();
								$.scojs_message('This is an error message', $.scojs_message.TYPE_ERROR);
							});
						</script>
					</div>
					<pre class="prettyprint linenums">
&lt;a id="message_trigger_ok" href="#">Click to see the info message&lt;/a>
&lt;a id="message_trigger_err" href="#">Click to see the error message&lt;/a>
&lt;script>
  $('#message_trigger_ok').on('click', function(e) {
    e.preventDefault();
    $.scojs_message('This is an info message', $.scojs_message.TYPE_OK);
  });
  $('#message_trigger_err').on('click', function(e) {
    e.preventDefault();
    $.scojs_message('This is an error message', $.scojs_message.TYPE_ERROR);
    });
&lt;/script>
</pre>

					<h2>用法</h2>
					<h3>作为jquery插件使用</h3>
					<pre class="prettyprint linenums">$.scojs_message(message, type);</pre>

					<h2>参数</h2>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 100px;">名称</th>
								<th style="width: 50px;">类型</th>
								<th style="width: 50px;">默认值</th>
								<th>说明</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>type</td>
								<td></td>
								<td></td>
								<td>The type of the message. Can be one of:
									<ul>
										<li>$.scojs_message.TYPE_OK</li>
										<li>$.scojs_message.TYPE_ERROR</li>
									</ul>
								</td>
							</tr>
						</tbody>
					</table>
				</section>


				<section id="valid">
					<div class="page-header">
						<h1>Valid <small>sco.valid.js</small></h1>
					</div>

					<h3>What?</h3>
					<p>Valid is a javascript form validation plugin. Basically, you give it a set of rules for a form's fields and it'll either submit the form if all rules pass or show error messages if not.</p>
					<p>Valid is the most complex and most opinionated plugin of all sco.js plugins. It also makes extensive use of other plugins (from sco.js and 3rd party) so make sure you load its dependencies before using it.
					It is loosely based on the <a target="_blank" href="http://bassistance.de/jquery-plugins/jquery-plugin-validation">jQuery form validation</a> plugin.</p>

					<h3>Why?</h3>
					<p>There are a couple of good form validators out there. I built this one because:</p>
					<ul>
						<li>I needed support for general error messages (i.e. not related to a certain field), besides field-related messages.</li>
						<li>I needed support for client side validation, as well as server side validation that would pass the errors to the client for display (<small>for example when a field would pass the "must be an email" client-side rule but it won't pass the "email already exists" server-side rule</small>).</li>
						<li>I wanted support for the JSend format - to pass instructions/messages from the backend to the front end in a standard format.</li>
						<li>Since I was using the <a target="_blank" href="http://kohanaframework.org">Kohana php framework</a> on the backend, I wanted the validation rules defined there to work transparently on the frontend as well.</li>
						<li>As much I would have wanted to use the browser form validation API, they were too limited, not translatable and not customizable.</li>
					</ul>

					<h3>依赖</h3>
					<p><a href="#message">Message</a> to display general messages, <a target="_blank" href="http://malsup.com/jquery/form">jQuery Form Plugin</a> to submit the form via ajax. It uses the
					<a target="_blank" href="http://labs.omniti.com/labs/jsend">JSend</a> specification to receive instructions from the backend. It does not depend on <a href="#modals">Modal</a> but it
					knows how to close the modal window if instructed to do so by the backend. The defaults of the plugin are based on the excellent <a target="_blank" href="http://valdelama.com/mosto">Mosto</a> css framework for forms but
					you can, of course, customize it to work with any framework.</p>

					<h3>案例</h3>
					<div class="bs-docs-example" style="padding-bottom: 24px;">
						<form action="valid.json" id="valid_form" class="form-horizontal">
							<label><div>Email</div> <input type="email" name="email"></label>
							<label><div>Password</div> <input type="password" name="pass"></label>
							<label><div>Password again</div> <input type="password" name="pass2"></label>
							<button type="submit" class="button">Try</button>
						</form>
						<script>
							$(function() {
								$('#valid_form').scojs_valid({rules: {email: ['not_empty', 'email'], pass: ['not_empty', {min_length: 4}], pass2: [{matches: 'pass'}]}});
							});
						</script>
					</div>
					<pre class="prettyprint linenums">
&lt;form action="valid.json" id="valid_form" class="form-horizontal">
  &lt;label>&lt;div>Email&lt;/div> &lt;input type="email" name="email">&lt;/label>
  &lt;label>&lt;div>Password&lt;/div> &lt;input type="password" name="pass">&lt;/label>
  &lt;label>&lt;div>Password again&lt;/div> &lt;input type="password" name="pass2">&lt;/label>
  &lt;button type="submit" class="btn">Try&lt;/button>
&lt;/form>
&lt;script>
  $(function() {
    $('#valid_form').scojs_valid({rules: {email: ['not_empty', 'email'], pass: ['not_empty', {'min_length': 4}], pass2: [{matches: 'pass'}]}});
  });
&lt;/script></pre>

					<h2>用法</h2>
					<h3>通过data属性（data-api）</h3>
					<p>No data attributes support yet but this is something I plan on having eventually. Patches are welcome!</p>

					<h3>作为jquery插件使用</h3>
					<pre class="prettyprint linenums">$('#form').scojs_valid({rules: options, messages: options});</pre>

					<h3>访问插件的对象实例</h3>
					<pre class="prettyprint linenums">var valid = $.scojs_valid(formId, options);</pre>
					<p>
						This gives you access to the created javascript object. You will have to call the object's methods on your own to trigger validation. Normally, this is all wrapped in the jQuery plugin but
						if you want custom functionality or you don't want to depend on the jQuery form plugin, this is the way to do it. You'll probably want to call <code>.validate()</code> on the js object before submitting the form
						and handle the JSend response from the server later on.<br>
						<code>formId</code> can be either a string selector or a jQuery object.<br>
						<code>options</code> should be an object with rules and (optional) messages: <code>{rules: {...}, messages: {...}}</code>
					</p>

					<h2>参数</h2>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 100px;">名称</th>
								<th style="width: 50px;">类型</th>
								<th style="width: 50px;">默认值</th>
								<th>说明</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>wrapper</td>
								<td>string</td>
								<td>label</td>
								<td>The wrapper of a form row. The default is set to label because the <a target="_blank" href="http://valdelama.com/mosto">Mosto</a> framework is using that. For <a target="_blank" href="http://twitter.github.com/bootstrap">Bootstrap</a> you could use <code>div.control-group</code>.
								This option is used to add an <code>.error</code> class to the selected element whenever there's an error related to this field so that you can display the field or label/error message in a different color/style. If you set this to <code>null</code>, the error class won't be added at all.</td>
							</tr>
							<tr>
								<td>rules</td>
								<td>object</td>
								<td>{}</td>
								<td>
									This is the set of rules that the whole form must pass for it to be submitted. The format of the object is field names as keys and arrays with rules as values:
									<pre class="prettyprint">{email: ['not_empty', 'email'], name: ['not_empty', {equals: 'john'}]}</pre>
									See the list of rules below for what can be used here.
								</td>
							</tr>
							<tr>
								<td>messages</td>
								<td>object</td>
								<td>{}</td>
								<td>The messages to display for each field in case of errors with that field. Could be useful for translating the messages into other languages. If you don't specify custom messages for your fields, the default ones will be used.
								See below for the default messages and message format.</td>
							</tr>
							<tr>
								<td>onSuccess</td>
								<td>function</td>
								<td></td>
								<td>
									The function to run when the backend sends a response with <code>status == 'success'</code>. The function receives the response, the validator object and the form as arguments. Returning <code>false</code> from this function will prevent the default onSuccess action.
									<pre>
$('#form').scojs_valid({
   rules: {...}
  ,onSuccess: function(response, validator, $form) {...}
});</pre>
								</td>
							</tr>
							<tr>
								<td>onError</td>
								<td>function</td>
								<td></td>
								<td>
									The function to run when the backend sends a response with <code>status == 'error'</code>. The function receives the response, the validator object and the form as arguments. Returning <code>false</code> from this function will prevent the default onError action.
									<pre>
$('#form').scojs_valid({
   rules: {...}
  ,onError: function(response, validator, $form) {...}
});</pre>
								</td>
							</tr>
							<tr>
								<td>onFail</td>
								<td>function</td>
								<td></td>
								<td>
									The function to run when the backend sends a response with <code>status == 'fail'</code>. The function receives the response, the validator object and the form as arguments. Returning <code>false</code> from this function will prevent the default onFail action.
									<pre>
$('#form').scojs_valid({
   rules: {...}
  ,onFail: function(response, validator, $form) {...}
});</pre>
								</td>
							</tr>
						</tbody>
					</table>

					<h3>Rules</h3>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 100px;">名称</th>
								<th style="width: 50px;">类型</th>
								<th style="width: 110px;">Example</th>
								<th>说明</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>not_empty</td>
								<td>string</td>
								<td>'not_empty'</td>
								<td>Use this rule if the field is required.</td>
							</tr>
							<tr>
								<td>min_length</td>
								<td>object</td>
								<td>{min_length: 10}</td>
								<td>If the field is not empty, it has to have at least the specified number of characters. Note that an empty field will pass this rule! If you want the field to be required, use the <code>not_empty</code> rule.</td>
							</tr>
							<tr>
								<td>max_length</td>
								<td>object</td>
								<td>{max_length: 20}</td>
								<td>If the field is not empty, it has to have at most the specified number of characters. Note that an empty field will pass this rule! If you want the field to be required, use the <code>not_empty</code> rule.</td>
							</tr>
							<tr>
								<td>regex</td>
								<td>object</td>
								<td>{regex: /[a-z]/}</td>
								<td>The field must pass the specified regular expression.</td>
							</tr>
							<tr>
								<td>email</td>
								<td>string</td>
								<td>'email'</td>
								<td>The field must be a valid email.</td>
							</tr>
							<tr>
								<td>url</td>
								<td>string</td>
								<td>'url'</td>
								<td>The field must be a valid url.</td>
							</tr>
							<tr>
								<td>exact_length</td>
								<td>object</td>
								<td>{exact_length: 10}</td>
								<td>If the field is not empty, it has to have exactly the specified number of characters. Note that an empty field will pass this rule! If you want the field to be required, use the <code>not_empty</code> rule.</td>
							</tr>
							<tr>
								<td>equals</td>
								<td>object</td>
								<td>{equals: 'bar'}</td>
								<td>The field value must be exactly the specified string.</td>
							</tr>
							<tr>
								<td>ip</td>
								<td>string</td>
								<td>'ip'</td>
								<td>The field must be a valid IP address.</td>
							</tr>
							<tr>
								<td>credit_card</td>
								<td>string</td>
								<td>'credit_card'</td>
								<td>If the field is not empty, it must be a valid credit card. Note that an empty field will pass this rule! If you want the field to be required, use the <code>not_empty</code> rule.</td>
							</tr>
							<tr>
								<td>alpha</td>
								<td>string</td>
								<td>'alpha'</td>
								<td>If the field is not empty, it must contain only a to z characters.</td>
							</tr>
							<tr>
								<td>alpha_numeric</td>
								<td>string</td>
								<td>'alpha_numeric'</td>
								<td>Like <code>alpha</code> plus the 0 to 9 digits.</td>
							</tr>
							<tr>
								<td>alpha_dash</td>
								<td>string</td>
								<td>'alpha_dash'</td>
								<td>Like <code>alpha_numeric</code> plus underscore (_) and minus (-).</td>
							</tr>
							<tr>
								<td>digit</td>
								<td>string</td>
								<td>'digit'</td>
								<td>If the field is not empty, it must contain only digits (0 to 9).</td>
							</tr>
							<tr>
								<td>numeric</td>
								<td>string</td>
								<td>'numeric'</td>
								<td>If the field is not empty, it must be a valid number (negative and decimal numbers allowed). For example -123456.50</td>
							</tr>
							<tr>
								<td>decimal</td>
								<td>string</td>
								<td>'decimal'</td>
								<td>Alias for <code>numeric</code>.</td>
							</tr>
							<tr>
								<td>matches</td>
								<td>object</td>
								<td>{matches: 'field1'}</td>
								<td>The field must match the specified field (have the same value as the other field).</td>
							</tr>
						</tbody>
					</table>

					<h3>Messages</h3>
					<p>The default messages used by the plugin, when no custom message is set. Note that any occurence of the string <code>:value</code> in the message is replaced
					by the rule constraint value.</p>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 100px;">Message for</th>
								<th>message</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>not_empty</td>
								<td>This field is required.</td>
							</tr>
							<tr>
								<td>min_length</td>
								<td>Please enter at least :value characters.</td>
							</tr>
							<tr>
								<td>max_length</td>
								<td>Please enter no more than :value characters.</td>
							</tr>
							<tr>
								<td>regex</td>
								<td></td>
							</tr>
							<tr>
								<td>email</td>
								<td>Please enter a valid email address.</td>
							</tr>
							<tr>
								<td>url</td>
								<td>Please enter a valid URL.</td>
							</tr>
							<tr>
								<td>exact_length</td>
								<td>Please enter exactly :value characters.</td>
							</tr>
							<tr>
								<td>equals</td>
								<td></td>
							</tr>
							<tr>
								<td>ip</td>
								<td></td>
							</tr>
							<tr>
								<td>credit_card</td>
								<td>Please enter a valid credit card number.</td>
							</tr>
							<tr>
								<td>alpha</td>
								<td></td>
							</tr>
							<tr>
								<td>alpha_numeric</td>
								<td></td>
							</tr>
							<tr>
								<td>alpha_dash</td>
								<td></td>
							</tr>
							<tr>
								<td>digit</td>
								<td>Please enter only digits.</td>
							</tr>
							<tr>
								<td>numeric</td>
								<td>Please enter a valid number.</td>
							</tr>
							<tr>
								<td>decimal</td>
								<td>Please enter a decimal number.</td>
							</tr>
							<tr>
								<td>matches</td>
								<td>Must match the previous value.</td>
							</tr>
						</tbody>
					</table>


					<h3>Communicate with the backend</h3>
					<p>Once the client side validation has passed, the form is submitted to the backend where you should have another round of validation. The backend can then tell the client what to do next: show some more errors, go to another page, show a <a href="#message">Message</a> and so on.
					<br>The instructions from backend to frontend are sent as json, in the <a target="_blank" href="http://labs.omniti.com/labs/jsend">JSend</a> format.</p>
					<p>案例:<br>
						<code>{"status":"success","data":{"next":"http://google.com"}}</code><br>
						<code>{"status":"fail","data":{"errors":{"email":"This error comes from server side"}}}</code><br>
						<code>{"status":"error","message":"The server made a boo boo"}</code>
					</p>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 100px;">名称</th>
								<th style="width: 50px;">possible values</th>
								<th>说明</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>status</td>
								<td>fail|error|success</td>
								<td>Use <code>fail</code> when there were validation errors on the server, <code>error</code> when there's a problem with the server and <code>success</code> when validation passed.</td>
							</tr>
							<tr>
								<td>data</td>
								<td></td>
								<td>
									This object is used for fail and success status codes to pass additional instructions to the frontend. Not used for error status codes.
									<ul>
										<li>with <code>fail</code> - data must be an object with a single <code>errors</code> key. The value of errors must be an object with field names as keys and error messages as values <pre>{"status":"fail","data":{"errors":{"email":"This email already exists", "name":"Enter your full name"}}}</pre></li>
										<li>
											with <code>success</code> - data must be an object with one of the following keys:
											<ul>
												<li><code>next</code> - (optional) Can have a value of "." to refresh the current page, "x" to close the modal the form was display into or some url to redirect the browser to that url.</li>
												<li><code>message</code> - (optional) If set, a success flash message is displayed using <a href="#message">Message</a>.</li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>
							<tr>
								<td>message</td>
								<td></td>
								<td>Used only with <code>error</code> status codes. An error flash message is displayed using <a href="#message">Message</a>.</td>
							</tr>
						</tbody>
					</table>

					<h2>方法</h2>
					<h4>.validate()</h4>
					<p>Performs the client side validation and show the errors on the form fields, if any. Returns <code>true</code> if all rules pass and <code>false</code> otherwise.</p>
					<pre class="prettyprint linenums">
var valid = $.scojs_valid('#signup_form', {rules: {email: ['not_empty']}});
valid.validate();</pre>
				</section>


				<section id="panes">
					<div class="page-header">
						<h1>Panes <small>sco.panes.js</small></h1>
					</div>

					<h3>What?</h3>
					<p>Panes is the core for tabs and carousels. Not meant to be used standalone, unless you want to provide functionality not covered by <a href="#tab">Tab</a> and <a href="#carousel">Carousel</a>.</p>
					<p>It provides the basic functionality to switch between a collection of elements - show one of them then hide that and show some other. Its aim is to be easily extensible - add any kind of transition effect you want, add callbacks, etc.<br>
					By default it comes with 3 transitions ( <code>xfade</code>, <code>slide</code>, <code>flip</code> ) but you can add as many as you want.
					</p>

					<h3>Why?</h3>
					<p>Tabs and carousels are basically the same thing (from a functional point of view): A collection of elements of which only one is visible at a time. You switch between the elements by clicking on tab headers or on navigation pills. Carousels are a bit more advanced
					than this but the core functionality is the same. It made sense to have a library to provide the common functionality for both. You can even think beyond just tabs and carousels - how about a pagination module that switches between pages (e.g. &laquo; 1 2 3...10 &raquo;)? Or a side menu that shows various pages
					with a nice transition between the pages? This pattern is quite used on the web.</p>

					<h3>依赖</h3>
					<p>If you want to use transitions you need to load bootstrap-transition.js before this.</p>

					<h3>案例</h3>
					<div class="bs-docs-example" style="padding-bottom: 24px;">
						<div class="pane-wrapper" id="panes-example">
							<div><img src="assets/img/carousel1.jpg"></div>
							<div><img src="assets/img/carousel2.jpg"></div>
						</div>
						<button class="btn" id="select-pane1">Show 1</button>
						<button class="btn" id="select-pane2">Show 2</button>
						<script>
							$(function() {
								var $panes = $.scojs_panes('#panes-example', {easing: 'flip'});
								$('#select-pane1').on('click', function() {
									$panes.select(0);
								});
								$('#select-pane2').on('click', function() {
									$panes.select(1);
								});
							});
						</script>
					</div>
					<pre class="prettyprint linenums">
&lt;div class="pane-wrapper" id="panes-example">
  &lt;div>&lt;img src="assets/img/carousel1.jpg">&lt;/div>
  &lt;div>&lt;img src="assets/img/carousel2.jpg">&lt;/div>
&lt;/div>
&lt;button class="btn" id="select-pane1">Show 1&lt;/button>
&lt;button class="btn" id="select-pane2">Show 2&lt;/button>
&lt;script>
  $(function() {
    var $panes = $.scojs_panes('#panes-example', {easing: 'flip'});
    $('#select-pane1').on('click', function() {
      $panes.select(0);
    });
    $('#select-pane2').on('click', function() {
      $panes.select(1);
    });
  });
&lt;/script></pre>

					<h2>用法</h2>
					<h3>访问插件的对象实例</h3>
					<pre class="prettyprint linenums">var $panes = $.scojs_panes(selector, options);</pre>

					<h2 id="panes-options">参数</h2>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 100px;">名称</th>
								<th style="width: 50px;">类型</th>
								<th style="width: 50px;">默认值</th>
								<th>说明</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>active</td>
								<td>integer</td>
								<td>0</td>
								<td>The index of the active pane (0 based).</td>
							</tr>
							<tr>
								<td>easing</td>
								<td>string</td>
								<td></td>
								<td>The css class to add to the wrapper. You could add the class yourself in html without specifying this option to the plugin but I might implement a javascript fallback for fade/slide so it's better
								that the plugin is aware of this. At the moment you can use <code>xfade</code>, <code>slide</code> and <code>flip</code>. You can, of course, define your own css-based transition effects, in which case you'd specify here the name of your css class.<br>
								For example, you could use easing: 'flip-vertical', copy all styles that start with .pane-wrapper.flip in scojs.css, replace .flip with .flip-vertical there and rotateY with rotateX.</td>
							</tr>
							<tr>
								<td>onBeforeSelect</td>
								<td>function</td>
								<td></td>
								<td>The callback to run just before selecting a new pane. If your callback returns false, the new pane will not be selected. Inside the function, <code>this</code> refers to the panes object so you can access all other object properties (like this.options, etc).</td>
							</tr>
						</tbody>
					</table>

					<h2 id="panes-methods">方法</h2>
					<h4>.select(index)</h4>
					<p>Select the index-th element (0-based). Returns true if the element was selected or false if not (selection might be blocked by the onBeforeSelect callback).</p>
					<pre class="prettyprint linenums">
var $panes = $.scojs_panes('#foo', {active: 1});
$panes.select(0);</pre>

					<h4>.prev()</h4>
					<p>Select the previous element. If the first element is active, <code>prev()</code> selects the last one. Returns true if the element was selected or false if not (selection might be blocked by the onBeforeSelect callback).</p>
					<pre class="prettyprint linenums">
var $panes = $.scojs_panes('#foo', {active: 1});
$panes.prev();</pre>

					<h4>.next()</h4>
					<p>Select the next element. If the last element is active, <code>next()</code> selects the first one. Returns true if the element was selected or false if not (selection might be blocked by the onBeforeSelect callback).</p>
					<pre class="prettyprint linenums">
var $panes = $.scojs_panes('#foo');
$panes.next();</pre>
				</section>


				<section id="ajax">
					<div class="page-header">
						<h1>Ajax <small>sco.ajax.js</small></h1>
					</div>

					<h3>What?</h3>
					<p>This is really just a convenient utility function that makes links load remote content with AJAX inside some target element on the page. This behaviour is also known as "ajaxification of links".
					Could be used for a side menu - all menu links would load just the page content, without a full page reload.</p>
					<p>Note that this function doesn't parse the output to display just a part of it in page and it doesn't make use of the browser history API. If you need such a full ajaxification plugin
					take a look at <a target="_blank" href="https://github.com/balupton/history.js">History.js</a>.</p>

					<h3>Why?</h3>
					<p>I needed some links to load their contents with ajax but not all. There was no need for browser history API support or anything fancy.</p>

					<h3>依赖</h3>
					<p>Ajax does not depend on other libraries (other than jQuery, of course). However, we recommend you load <a target="_blank" href="http://fgnass.github.com/spin.js">spin.js</a>.
					If spin.js is found, a spinning wheel is displayed during the loading of remote content.</p>

					<h3>案例</h3>
					<div class="bs-docs-example" style="padding-bottom: 24px;">
						<a data-trigger="ajax" href="lipsum.html" data-target="#ajax_target" class="btn btn-primary btn-large">Ajax demo</a>
						<div id="ajax_target">Remote content will be loaded here</div>
					</div>
					<pre class="prettyprint linenums">
&lt;!-- Button to trigger ajax -->
&lt;a data-trigger="ajax" href="lipsum.html" data-target="#ajax_target" class="btn">Ajax demo&lt;/a></pre>

					<h2>用法</h2>
					<h3>通过data属性（data-api）</h3>
					<pre class="prettyprint linenums">&lt;a data-trigger="ajax" href="lipsum.html" data-target="#ajax_target" class="btn">Ajax demo&lt;/a></pre>
					<p>The data-api usage is "live" - meaning that you don't have to rebind new elements. Every new element
					having a <code>data-trigger="ajax"</code> attribute that is added to the dom after the initial load will work out of the box.</p>

					<h2>参数</h2>
					<p>Options are passed with attributes.</p>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 100px;">名称</th>
								<th style="width: 50px;">类型</th>
								<th style="width: 50px;">默认值</th>
								<th>说明</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>data-target</td>
								<td>string</td>
								<td></td>
								<td>The container for the content. This option should point to an existing element on the page.</td>
							</tr>
							<tr>
								<td>href</td>
								<td>string</td>
								<td></td>
								<td>URL to load the content from.</td>
							</tr>
						</tbody>
					</table>
				</section>


				<section id="countdown">
					<div class="page-header">
						<h1>倒计时（Countdown） <small>sco.countdown.js</small></h1>
					</div>

					<h3>What?</h3>
					<p>这是一个简单的倒计时（Countdown）插件，没什么太特别的。你给这个插件一个日期/时间，他就会在你指定的页面元素内展示出来，并开始计时。</p>

					<h3>Why?</h3>
					<p>我的项目中需要一个剩余时间提醒，因此就做了这个插件。和Bootstrap没有太大关系，但是可能对大家有些用处。</p>

					<h3>依赖</h3>
					<p>jQuery.</p>

					<h3>案例</h3>
					<div class="bs-docs-example" style="padding-bottom: 24px;">
						<script>
							$(function() {
								var  today = new Date()
									,tomorrow = Math.round(today.setDate(today.getDate() + 1) / 1000)	// seconds instead of milliseconds
									;
								$('#countdowner').scojs_countdown({until: tomorrow});
							});
						</script>
						<div id="countdowner"></div>
					</div>
<pre class="prettyprint linenums">
&lt;div id="countdowner">&lt;/div>
&lt;script>
$('#countdowner').scojs_countdown({until: 1364382956});
&lt;/script></pre>

					<h2>用法</h2>
					<h3>通过data属性（data-api）</h3>
					<p>此插件无法使用data-api初始化，但是你可以通过<code>data</code>属性在目标页面元素上指定参数：</p>
					<pre class="prettyprint linenums">&lt;div id="countdowner" data-d="días" data-h="horas" data-m="minutos" data-s="segundos">&lt;/div></pre>

					<h3>作为jquery插件使用</h3>
					<pre class="prettyprint linenums">$('#target').scojs_countdown(options);</pre>

					<h2>参数</h2>
					<p>可以通过data属性或者JavaScript代码传递参数。对于data属性，将参数名添加到<code>data-</code>之后，例如<code>data-d="days"</code>。</p>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 100px;">名称</th>
								<th style="width: 50px;">类型</th>
								<th style="width: 50px;">默认值</th>
								<th>说明</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>until</td>
								<td>integer</td>
								<td></td>
								<td>Unix timestamp (in seconds) to countdown to. This option is required.</td>
							</tr>
							<tr>
								<td>d</td>
								<td>string</td>
								<td>d</td>
								<td>Text to show after the count of days. By default it shows 'd' as in 12d but if you change it to, say, 'days', it'll show 12days.</td>
							</tr>
							<tr>
								<td>h</td>
								<td>string</td>
								<td>h</td>
								<td>Text to show after the count of hours. By default it shows 'h' as in 12h but if you change it to, say, 'hours', it'll show 12hours.</td>
							</tr>
							<tr>
								<td>m</td>
								<td>string</td>
								<td>m</td>
								<td>Text to show after the count of minutes. By default it shows 'm' as in 12m but if you change it to, say, 'minutes', it'll show 12minutes.</td>
							</tr>
							<tr>
								<td>s</td>
								<td>string</td>
								<td>s</td>
								<td>Text to show after the count of seconds. By default it shows 's' as in 12s but if you change it to, say, 'seconds', it'll show 12seconds.</td>
							</tr>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>
</div>