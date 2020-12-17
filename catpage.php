<?php
/**
 * Catpage File.
 * PHP version 5
 * 
 * @category Components
 * @package  PHP
 * @author   Md Ismail <mi0718839@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @version  SVN: $Id$
 * @link     https://yoursite.com
 */
require "header.php";
$prod = new Product();
$all_prod = $prod->all_prod($db->conn);
$cat = $prod->fetch_cat_name($_GET['id'], $db->conn);
?>
<!---singleblog--->
<div class="content">
    <div class="linux-section">
        <div class="container">
            <div class="linux-grids">
                <div class="col-md-8 linux-grid">
                <?php foreach ($all_prod as $key => $val) { 
                    if ($_GET['id'] == $val['prod_id']) {
                        $description = json_decode($val['description']);?>
                <h2><?php echo $val['prod_name']; ?></h2>
                <?php echo $val['html']; ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="tab-prices">
        <div class="container">
            <div class="bs-example bs-example-tabs" 
            role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#home" id="home-tab" role="tab" data-toggle="tab" 
                        aria-controls="home" aria-expanded="true">
                            IN Hosting
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#profile" role="tab" id="profile-tab" 
                        data-toggle="tab" aria-controls="profile">
                            US Hosting
                        </a>
                    </li>
                    </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" 
                    id="home" aria-labelledby="home-tab">
                        <div class="linux-prices">
                            <div class="col-md-3 linux-price">
                                <div class="linux-top">
                                <h4><?php echo $cat ?></h4>
                                </div>
                                <div class="linux-bottom">
                                    <h5>₹ <?php echo $val['mon_price']; ?>
                                        <span class="month">per month</span>
                                    </h5>
                                    <h6>Domain: <?php echo $description->domain; ?></h6>
                                    <ul>
                                    <li><strong> <?php echo $description->web_space; ?></strong> Disk Space</li>
                                    <li><strong> <?php echo $description->bandwidth; ?></strong> Data Transfer</li>
                                    <li>
                                        <strong> <?php echo $description->mail; ?></strong> Email Accounts
                                    </li>
                                    <li><strong>Includes </strong>  Global CDN</li>
                                    <li><strong>High Performance</strong>Servers</li>
                                    <li>
                                        <strong>location</strong> 
                                        : <img src="images/india.png">
                                    </li>
                                    </ul>
                                </div>
                                <button type="button" class="buy_btn" data-pid="<?php echo $val['id'];?>"
                                data-name="<?php echo $val['prod_name']; ?>"  
                                data-cat_name="<?php echo $cat; ?>" 
                                data-available="<?php echo $val['prod_available']; ?>"  
                                data-date="<?php echo $val['prod_launch_date']; ?>"  
                                data-mon_price="<?php echo $val['mon_price']; ?>" 
                                data-annual_price="<?php echo $val['annual_price']; ?>" 
                                data-sku="<?php echo $val['sku']; ?>"
                                data-web_space="<?php echo $description->web_space; ?>"
                                data-domain="<?php echo $description->domain; ?>"
                                data-techno="<?php echo $description->techno; ?>"
                                data-mail="<?php echo $description->mail; ?>" >Buy</button>
                            </div>
                                <?php } ?>
                            <?php } ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" 
                    id="profile" aria-labelledby="profile-tab">
                        <div class="linux-prices">
                            <div class="col-md-3 linux-price">
                                <div class="linux-top us-top">
                                <h4>Standard</h4>
                                </div>
                                <div class="linux-bottom us-bottom">
                                    <h5>$259 
                                        <span class="month">per month</span>
                                    </h5>
                                    <h6>Single Domain</h6>
                                    <ul>
                                    <li><strong>Unlimited</strong> Disk Space</li>
                                    <li><strong>Unlimited</strong> Data Transfer</li>
                                    <li>
                                        <strong>Unlimited</strong>
                                         Email Accounts
                                    </li>
                                    <li><strong>Includes </strong>  Global CDN</li>
                                    <li>
                                        <strong>High Performance</strong>
                                          Servers
                                    </li>
                                    <li>
                                        <strong>location</strong> 
                                        : <img src="images/us.png">
                                    </li>
                                    </ul>
                                </div>
                                <a href="#" class="us-button">buy now</a>
                            </div>
                            <div class="col-md-3 linux-price">
                                <div class="linux-top us-top">
                                <h4>Advanced</h4>
                                </div>
                                <div class="linux-bottom us-bottom">
                                    <h5>$359 
                                        <span class="month">per month</span>
                                    </h5>
                                    <h6>2 Domains</h6>
                                    <ul>
                                    <li><strong>Unlimited</strong> Disk Space</li>
                                    <li><strong>Unlimited</strong> Data Transfer</li>
                                    <li>
                                        <strong>Unlimited</strong>
                                         Email Accounts
                                    </li>
                                    <li><strong>Includes </strong>  Global CDN</li>
                                    <li>
                                        <strong>High Performance</strong>
                                          Servers 
                                    </li>
                                    <li>
                                        <strong>location</strong> 
                                        : <img src="images/us.png">
                                    </li>
                                    </ul>
                                </div>
                                <a href="#" class="us-button">buy now</a>
                            </div>
                            <div class="col-md-3 linux-price">
                                <div class="linux-top us-top">
                                <h4>Business</h4>
                                </div>
                                <div class="linux-bottom us-bottom">
                                    <h5>$539 
                                        <span class="month">per month</span>
                                    </h5>
                                    <h6>3 Domains</h6>
                                    <ul>
                                    <li><strong>Unlimited</strong> Disk Space</li>
                                    <li><strong>Unlimited</strong> Data Transfer</li>
                                    <li>
                                        <strong>Unlimited</strong>
                                         Email Accounts
                                    </li>
                                    <li><strong>Includes </strong>  Global CDN</li>
                                    <li>
                                        <strong>High Performance</strong>
                                          Servers
                                    </li>
                                    <li>
                                        <strong>location</strong> 
                                        : <img src="images/us.png">
                                    </li>
                                    </ul>
                                </div>
                                <a href="#" class="us-button">buy now</a>
                            </div>
                            <div class="col-md-3 linux-price">
                                <div class="linux-top us-top">
                                <h4>Pro</h4>
                                </div>
                                <div class="linux-bottom us-bottom">
                                    <h5>$639 
                                        <span class="month">per month</span>
                                    </h5>
                                    <h6>Unlimited Domains</h6>
                                    <ul>
                                    <li><strong>Unlimited</strong> Disk Space</li>
                                    <li><strong>Unlimited</strong> Data Transfer</li>
                                    <li>
                                        <strong>Unlimited</strong>
                                         Email Accounts
                                    </li>
                                    <li><strong>Includes </strong>  Global CDN</li>
                                    <li>
                                        <strong>High Performance</strong>
                                          Servers
                                    </li>
                                    <li>
                                        <strong>location</strong> 
                                        : <img src="images/us.png">
                                    </li>
                                    </ul>
                                </div>
                                <a href="#" class="us-button">buy now</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- clients -->
<div class="clients">
    <div class="container">
        <h3>Some of our satisfied clients include...</h3>
        <ul>
            <li><a href="#"><img src="images/c1.png" title="disney" /></a></li>
            <li><a href="#"><img src="images/c2.png" title="apple" /></a></li>
            <li><a href="#"><img src="images/c3.png" title="microsoft" /></a></li>
            <li><a href="#"><img src="images/c4.png" title="timewarener" /></a></li>
            <li><a href="#"><img src="images/c5.png" title="disney" /></a></li>
            <li><a href="#"><img src="images/c6.png" title="sony" /></a></li>
        </ul>
    </div>
</div>
<!-- clients -->
    <div class="whatdo">
        <div class="container">
            <h3>Linux Features</h3>
            <div class="what-grids">
                <div class="col-md-4 what-grid">
                    <div class="what-left">
                    <i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
                    </div>
                    <div class="what-right">
                        <h4>Expert Web Design</h4>
                        <p>
                            Lorem ipsum dolor sit amet conse 
                            ctetur adipisicing elit, 
                            sed do eiusmod tempor incididunt ut labore et dolore 
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-4 what-grid">
                    <div class="what-left">
                    <i class="glyphicon glyphicon-dashboard" aria-hidden="true"></i>
                    </div>
                    <div class="what-right">
                        <h4>Expert Web Design</h4>
                        <p>
                            Lorem ipsum dolor sit amet conse ctetur 
                            adipisicing elit, sed do eiusmod tempor 
                            incididunt ut labore et dolore 
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-4 what-grid">
                    <div class="what-left">
                    <i class="glyphicon glyphicon-stats" aria-hidden="true"></i>
                    </div>
                    <div class="what-right">
                        <h4>Expert Web Design</h4>
                        <p>Lorem ipsum dolor sit amet conse 
                            ctetur adipisicing elit, sed do eiusmod 
                            tempor incididunt ut labore et dolore
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="what-grids">
                <div class="col-md-4 what-grid">
                    <div class="what-left">
                    <i class="glyphicon glyphicon-download-alt" 
                    aria-hidden="true"></i>
                    </div>
                    <div class="what-right">
                        <h4>Expert Web Design</h4>
                        <p>
                            Lorem ipsum dolor sit amet conse 
                            ctetur adipisicing elit, sed do eiusmod tempor 
                            incididunt ut labore et dolore 
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-4 what-grid">
                    <div class="what-left">
                    <i class="glyphicon glyphicon-move" aria-hidden="true"></i>
                    </div>
                    <div class="what-right">
                        <h4>Expert Web Design</h4>
                        <p>
                            Lorem ipsum dolor sit amet conse 
                            ctetur adipisicing elit, sed do eiusmod 
                            tempor incididunt ut labore et dolore 
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-4 what-grid">
                    <div class="what-left">
                    <i class="glyphicon glyphicon-screenshot" aria-hidden="true"></i>
                    </div>
                    <div class="what-right">
                        <h4>Expert Web Design</h4>
                        <p>
                            Lorem ipsum dolor sit amet conse 
                            ctetur adipisicing elit, sed do 
                            eiusmod tempor incididunt ut labore 
                            et dolore 
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

</div>
<?php
require "footer.php";
?>