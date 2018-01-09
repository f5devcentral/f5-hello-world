<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/css/fonts.css" type="text/css">
    <link rel="stylesheet" href="/css/atom-one-dark.css" type="text/css">
    <link rel="stylesheet" href="/css/main.css" type="text/css">
    <link rel="stylesheet" href="/css/custom.css" type="text/css">
    <script src="/js/highlight.pack.js" type="text/javascript"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script src="/js/custom.js" type="text/javascript"></script>
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col hw-banner">
          <hr class="hw-nodeColor">
        </div>
      </div>
      <div class="row">
        <div class="col hw-header">
          <h4 class="animate fadeInDown one">hello, <?php if ($node = getenv("NODE")) echo $node; else echo "world" ?></h4>
  				<div class="marTop30"></div>
        </div>
      </div>
      <div class="row">
        <div class="col hw-content">
          <ul class="nav nav-tabs" id="tabs-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="tabs-info-tab" data-toggle="tab" href="#tabs-info" role="tab" aria-controls="tabs-info" aria-selected="true">Info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tabs-profile-tab" data-toggle="tab" href="#tabs-request" role="tab" aria-controls="tabs-request" aria-selected="false">HTTP Request</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tabs-contact-tab" data-toggle="tab" href="#tabs-response" role="tab" aria-controls="tabs-response" aria-selected="false">HTTP Response</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tabs-contact-tab" data-toggle="tab" href="#tabs-envvar" role="tab" aria-controls="tabs-envvar" aria-selected="false">Server Environment</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tabs-contact-tab" data-toggle="tab" href="#tabs-about" role="tab" aria-controls="tabs-about" aria-selected="false">About</a>
            </li>
          </ul>
          <div class="tab-content" id="tabs-tabContent">
            <div class="tab-pane fade show active" id="tabs-info" role="tabpanel" aria-labelledby="tabs-info-tab">
              <div class="row">
                <div class="col-sm-6">
                  <b>Server</b>
                  <table class="table table-data table-bordered table-sm mt-2">
                    <tbody>
                      <tr>
                        <th>Node Name</th>
                        <td><?php if ($node = getenv("NODE")) echo $node; else echo "<i>Not found</i>" ?></td>
                      </tr>
                      <tr>
                        <th scope="row">HTTP Username</th>
                        <td><?php if ($user = $_SERVER["PHP_AUTH_USER"]) echo $user; else echo "<i>Not found</i>"; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-sm-6">
                  <b>Network</b>
                  <table class="table table-data table-bordered table-sm mt-2">
                    <tbody>
                      <tr>
                        <th scope="row">Source IP/Port</th>
                        <td><?php echo $_SERVER["REMOTE_ADDR"] . ":" . $_SERVER["REMOTE_PORT"]; ?></td>
                      </tr>
                      <tr>
                        <th scope="row">Destination IP/Port</th>
                        <td><?php echo $_SERVER["SERVER_ADDR"] . ":" . $_SERVER["SERVER_PORT"]; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <b>Common HTTP Headers</b>
                  <table class="table table-data table-bordered table-sm mt-2">
                    <tbody>
                      <?php
                      $headers = array("Host"=>"HTTP_HOST",
                                       "X-Forwarded-For"=>"HTTP_X_FORWARDED_FOR");

                      foreach($headers as $k => $v) {
                        if (! $tmp = getenv($v)) {
                          $tmp = "<i>Not found</i>";
                        }
                        echo "<tr><th scope=\"row\">$k</th><td width=80%>$tmp</td></tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <b>Cookies</b>
                  <table class="table table-data table-bordered table-sm mt-2">
                    <tbody>
                      <?php
                      foreach($_COOKIE as $k => $v) {
                          echo "<tr><th scope=\"row\">$k</th><td width=80%>$v</td></tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="tabs-request" role="tabpanel" aria-labelledby="tabs-request-tab">
              <div class="row no-gutters">
                <div class="col-sm-6">
                  <table class="table table-data table-bordered table-sm mb-0">
                    <tbody>
                      <tr>
                        <th scope="row">
                          <pre><code class="http"><?php echo $_SERVER["REQUEST_METHOD"] . " "; echo $_SERVER["REQUEST_URI"] . " "; echo $_SERVER["SERVER_PROTOCOL"] . "\n\n";
                      				$arrHeaders = apache_request_headers();
                      				foreach ($arrHeaders as $header => $value)
                      					echo "$header: $value\n";
                      			?>
                          </code></pre>
                        </th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="tabs-response" role="tabpanel" aria-labelledby="tabs-response-tab">
              <div class="row no-gutters">
                <div class="col-sm-6">
                  <table class="table table-data table-bordered table-sm mb-0">
                    <tbody>
                      <tr>
                        <th scope="row">
                          <pre><code class="http"><?php echo $_SERVER["SERVER_PROTOCOL"] . " 200 OK\n\n";
                      				echo "Server: " . $_SERVER["SERVER_SOFTWARE"] . "\n";
                      				flush();
                      				$arrHeaders = apache_response_headers();
                      				foreach ($arrHeaders as $header => $value)
                      					echo "$header: $value\n";
                      			?>
                          </code></pre>
                        </th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="tabs-envvar" role="tabpanel" aria-labelledby="tabs-envvar-tab">

              <div class="row no-gutters">
                <div class="col-sm-6">
                  <table class="table table-data table-bordered table-sm mb-0">
                    <tbody>
                      <tr>
                        <th>
                          <pre><code><?php
                  						foreach($_SERVER as $header => $value)
                  							echo "$header=$value\n";
                  					?>
                          </code></pre>
                        </th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="tabs-about" role="tabpanel" aria-labelledby="tabs-about-tab">
              <div class="col-md-10">
                <p>This sample web application was created by <a href="https://f5.com">F5 Networks</a> as
                part of the <a href="https://f5.com/supernetops">Super-NetOps Training Program.</a>
                It is Open-Source and free for anyone to use and contribute to.</p>

                <p>It also enjoys long walks on the beach and adult beverages with extra umbrellas...</p>

                <p>If you find a bug, have a feature request or would like to contribute please visit our
                GitHub repository
                at:</p><p><a href="https://github.com/f5devcentral/f5-hello-world">https://github.com/f5devcentral/f5-hello-world</a></p>

                <table>
                  <tr>
                    <td>
                      <ul class="soc animate fadeIn two mt-2">
                        <li><a class="soc-linkedin" href="https://www.linkedin.com/groups/13539166" target="_blank"></a></li>
            					  <li><a class="soc-twitter" href="https://twitter.com/F5Networks" target="_blank"></a></li>
                      </ul>
                    </td>
                    <td>
                      <ul class="soc animate fadeIn two">
                        <li><a class="soc-github" href="http://clouddocs.f5.com/training/community/github_search.html"></a></li>
                      </ul>
                    </td>
                    <td>
                      <p class="animate fadeIn two hw-ghblock"><a href="https://github.com/f5devcentral/" target="_blank">Community Supported</a></p>
                      <a class="animate fadeIn two" href="https://github.com/f5networks/" target="_blank">Officially Supported</a>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col hw-footer">
          <ul class="soc animate fadeIn two mt-2">
  					<li><a href="https://f5.com/" target="_blank"><img src="/img/f5.svg" width="48"></a></li>
  					<li><a href="https://f5.com/SuperNetOps" target="_blank"><img src="/img/sno.svg" width="48"></a></li>
  				</ul>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/jquery-3.2.1.slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
