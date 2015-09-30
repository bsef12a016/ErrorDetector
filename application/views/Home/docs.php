<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->
    <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
    <div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style="background-image: url(<?=base_url()?>public/assets/base/img/content/backgrounds/bg-37.jpg)">
        <div class="container" style="margin-top:40px;">
            <div class="c-page-title c-pull-left">
                <h3 class="c-font-uppercase c-font-bold c-font-white c-font-20 c-font-slim">DOCS</h3>
                <h4 class="c-font-white c-font-thin c-opacity-07">
                    ---------
                </h4>
            </div>
        </div>
    </div>
    <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
    <!-- BEGIN: CONTENT/FEATURES/FEATURES-5 -->
    <!-- BEGIN: FEATURES 5 -->
    
    
    
    <div class="c-content-box c-size-lg c-bg-grey-1">
        <div class="container">
            <div class="c-content-panel">
                <div class="c-body">
                    <div class="c-content-tab-1">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="tab-content c-padding-sm">
                                    <h1>
                                        jErrors Documentation
                                    </h1>
                                    <p>
                                        Welcome to jError's documentation center. Here you'll find guides on how to get the most out of jErrors, instructions for how to install and configure error detector in your apps or projects.
                                        The jErrors error detector for JavaScript gives you instant notification of errors and exceptions in your website's JavaScript code. jErrors captures errors in real-time from your web, mobile and desktop applications, helping you to understand and resolve them as fast as possible.
                                        jErrors JavaScript error detector has no external dependencies, not even JQuery and works in all browsers. Create a free account for capturing JavaScript errors from your websites or applications.
                                        The 404 or Not Found error message is an HTTP standard response code indicating that the client was able to communicate with a given server, but the server could not find what was requested. The jerrors.js library also captures 404 errors.
                                    </p>
                                </div>
                                    
                                <div class="tab-content c-padding-sm">
                                    <h1>
                                        How to Install
                                    </h1>
                                    <p>
                                        Include jqery and jerrors.js in the <head> tag of your website, before any 
                                    <span class="">
                                        <span class="">&lt;</span><span class="">/</span><span class="">script</span>
                                    </span><span class="">&gt;</span>
                                    othertags.
                                    </p>
                                    <code data-language="html" class="">
                                        <span class="">
                                            <span class="">&lt;</span><span class="">script</span>
                                        </span>
                                        <span class="">src</span><span class="">=</span><span class="">"</span><span class="">https://code.jquery.com/jquery-2.1.4.js</span><span class="">"></span>
                                        <span class="">
                                            <span class="">&lt;</span><span class="">/</span><span class="">script</span>
                                        </span><span class="">&gt;</span>
                                    </code>
                                    <br>
                                    <code data-language="html" class="">
                                        <span class="">
                                            <span class="">&lt;</span><span class="">script</span>
                                        </span>
                                        <span class="">src</span><span class="">=</span><span class="">"</span><span class="">http://jerrors-1cad.kxcdn.com/jerrors.js</span><span class="">"</span>
                                        <span class="">data-apikey</span><span class="">=</span><span class="">"</span><span class="">YOUR API KEY HERE</span><span class="">"</span><span class="">></span>
                                        <span class="">
                                            <span class="">&lt;</span><span class="">/</span><span class="">script</span>
                                        </span><span class="">&gt;</span>
                                    </code>
                                    <p>    
                                        Make sure to set your API key in the data-apikey attribute on the script tag, or manually set apiKey.
                                        Now all uncaught exceptions will be sent to your jErrors Dashboard , without any further work from you.
                                    </p>
                                </div>
                                <div class="tab-content c-padding-sm">
                                    <h1>
                                        Sending Caught Exceptions or Custom Errors
                                    </h1>
                                    <p>
                                        You can easily tell SNIK about caught exceptions by calling notifyException.
                                        <br>
                                        try{
                                        <br>
                                        &#09;//Some code which might throw an exception
                                        } catch (e) {
                                        notifyException(e);
                                        }
                                        Since many exceptions in JavaScript are named simply Error, we also allow you to provide a custom error name when calling  notifyException:
                                        try {
                                        //Some code which might throw an exception
                                        } catch (e) {
                                        notifyException(e, "CustomErrorName");
                                        }
                                    </p>
                                </div>
                                <div class="tab-content c-padding-sm">
                                    <h1>
                                        API Key Configuration
                                    </h1>
                                    <p>
                                        You can easily tell SNIK about caught exceptions by calling notifyException.
                                        try{
                                        //Some code which might throw an exception
                                        } catch (e) {
                                        notifyException(e);
                                        }
                                        Since many exceptions in JavaScript are named simply Error, we also allow you to provide a custom error name when calling  notifyException:
                                        try {
                                        //Some code which might throw an exception
                                        } catch (e) {
                                        notifyException(e, "CustomErrorName");
                                        }
                                    </p>
                                </div>
                                
                                <div class="tab-content c-padding-sm">
                                    <h1>
                                        Contributing to the Documentation
                                    </h1>
                                    <p>
                                        Most of our documentation is hosted on GitHub, so if you see a mistake/typo, or you have some improvements you'd like us to add, feel free to send us a pull request!
                                    </p>
                                </div>
                                <div class="tab-content c-padding-sm">
                                    <h1>
                                        Need More Help?
                                    </h1>
                                    <p>
                                        If you can't find what you are looking for in the documentation, please feel free to contact us in person, we'd love to hear from you:
                                        <br> Email us at <strong>support@jerrors.com</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: PAGE CONTAINER -->




