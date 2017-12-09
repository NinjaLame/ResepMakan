<!-- common libraries. required for every page-->
<script src="<?php echo base_url("assets/ast_mahasiswa/templates/");?>lib/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url("assets/ast_mahasiswa/templates/");?>lib/jquery-pjax/jquery.pjax.js"></script>
<script src="<?php echo base_url("assets/ast_mahasiswa/templates/");?>lib/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>
<script src="<?php echo base_url("assets/ast_mahasiswa/templates/");?>lib/widgster/widgster.js"></script>
<script src="<?php echo base_url("assets/ast_mahasiswa/templates/");?>lib/underscore/underscore.js"></script>
<!-- common application js -->
<script src="<?php echo base_url("assets/ast_mahasiswa/templates/");?>js/app.js"></script>
<script src="<?php echo base_url("assets/ast_mahasiswa/templates/");?>js/settings.js"></script>

<!-- common templates -->
<script type="text/template" id="settings-template">
    <div class="setting clearfix">
        <div>Sidebar on the</div>
        <div id="sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% onRight = sidebar == 'right'%>
            <button type="button" data-value="left" class="btn btn-sm btn-default <%= onRight? '' : 'active' %>">Left</button>
            <button type="button" data-value="right" class="btn btn-sm btn-default <%= onRight? 'active' : '' %>">Right</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Sidebar</div>
        <div id="display-sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% display = displaySidebar%>
            <button type="button" data-value="true" class="btn btn-sm btn-default <%= display? 'active' : '' %>">Show</button>
            <button type="button" data-value="false" class="btn btn-sm btn-default <%= display? '' : 'active' %>">Hide</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Light Version</div>
        <div>
            <a href="../light/index.html" class="btn btn-sm btn-default">&nbsp; Switch &nbsp;   <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
    <div class="setting clearfix">
        <div>White Version</div>
        <div>
            <a href="../white/index.html" class="btn btn-sm btn-default">&nbsp; Switch &nbsp;   <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</script>

<script type="text/template" id="sidebar-settings-template">
    <% auto = sidebarState == 'auto'%>
    <% if (auto) {%>
    <button type="button"
            data-value="icons"
            class="btn-icons btn btn-transparent btn-sm">Icons</button>
    <button type="button"
            data-value="auto"
            class="btn-auto btn btn-transparent btn-sm">Auto</button>
    <%} else {%>
    <button type="button"
            data-value="auto"
            class="btn btn-transparent btn-sm">Auto</button>
    <% } %>
</script>

    <!-- page specific scripts -->
        <!-- page libs -->
        <script src="<?php echo base_url("assets/ast_mahasiswa/templates/");?>lib/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url("assets/ast_mahasiswa/templates/");?>lib/jquery.sparkline/index.js"></script>

        <script src="<?php echo base_url("assets/ast_mahasiswa/templates/");?>lib/backbone/backbone.js"></script>
        <script src="<?php echo base_url("assets/ast_mahasiswa/templates/");?>lib/backbone.localStorage/backbone.localStorage-min.js"></script>

        <script src="<?php echo base_url("assets/ast_mahasiswa/templates/");?>lib/d3/d3.min.js"></script>
        <script src="<?php echo base_url("assets/ast_mahasiswa/templates/");?>lib/nvd3/build/nv.d3.min.js"></script>

        <!-- page application js -->
        <script src="<?php echo base_url("assets/ast_mahasiswa/templates/");?>js/index.js"></script>
        <script src="<?php echo base_url("assets/ast_mahasiswa/templates/");?>js/chat.js"></script>

        <!-- page template -->
        <script type="text/template" id="message-template">
            <div class="sender pull-left">
                <div class="icon">
                    <img src="img/2.png" class="img-circle" alt="">
                </div>
                <div class="time">
                    just now
                </div>
            </div>
            <div class="chat-message-body">
                <span class="arrow"></span>
                <div class="sender"><a href="#">Tikhon Laninga</a></div>
                <div class="text">
                    <%- text %>
                </div>
            </div>
        </script>

</body>
</html>

<script>
	/*
 * requestAnimationFrame pollyfill
 */
if (!window.requestAnimationFrame) {
	window.requestAnimationFrame = (window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.msRequestAnimationFrame || window.oRequestAnimationFrame || function (callback) {
		return window.setTimeout(callback, 1000 / 60);
	});
}

// Init Stats
var stats = new Stats();
stats.setMode(0);
stats.domElement.style.position = 'absolute';
stats.domElement.style.left = '0px';
stats.domElement.style.top = '0px';
//document.body.appendChild(stats.domElement);


/*!
 * Mantis.js / jQuery / Zepto.js plugin for Constellation
 * @version 1.2.2
 * @author Acauã Montiel <contato@acauamontiel.com.br>
 * @license http://acaua.mit-license.org/
 */
(function ($, window) {
	var $window = $(window);
	/**
	 * Makes a nice constellation on canvas
	 * @constructor Constellation
	 */
	function Constellation (canvas, options) {
		var $canvas = $(canvas),
			context = canvas.getContext('2d'),
			defaults = {
				star: {
					color: 'rgba(255, 255, 255, .2)',
					width: 1,
					randomWidth: true
				},
				line: {
					color: 'rgba(255, 255, 255, 0.5)',
					width: 0.2
				},
				position: {
					x: 0,
					y: 0
				},
				width: window.innerWidth,
				height: window.innerHeight,
				velocity: 0.1,
				length: 100,
				distance: 120,
				radius: 150,
				stars: []
			},
			config = $.extend(true, {}, defaults, options);
			config.length = 150;
		function Star () {
			this.x = Math.random() * canvas.width;
			this.y = Math.random() * canvas.height;

			this.vx = (config.velocity - (Math.random() * 0.5));
			this.vy = (config.velocity - (Math.random() * 0.5));

			this.radius = config.star.randomWidth ? (Math.random() * config.star.width) : config.star.width;
		}

		Star.prototype = {
			create: function(){
				context.beginPath();
				context.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
				context.fill();
			},

			animate: function(){
				var i;
				for (i = 0; i < config.length; i++) {

					var star = config.stars[i];

					if (star.y < 0 || star.y > canvas.height) {
						star.vx = star.vx;
						star.vy = - star.vy;
					} else if (star.x < 0 || star.x > canvas.width) {
						star.vx = - star.vx;
						star.vy = star.vy;
					}

					star.x += star.vx;
					star.y += star.vy;
				}
			},

			line: function(){
				var length = config.length,
					iStar,
					jStar,
					i,
					j;

				for (i = 0; i < length; i++) {
					for (j = 0; j < length; j++) {
						iStar = config.stars[i];
						jStar = config.stars[j];

						if (
							(iStar.x - jStar.x) < config.distance &&
							(iStar.y - jStar.y) < config.distance &&
							(iStar.x - jStar.x) > - config.distance &&
							(iStar.y - jStar.y) > - config.distance
						) {
							if (
								(iStar.x - config.position.x) < config.radius &&
								(iStar.y - config.position.y) < config.radius &&
								(iStar.x - config.position.x) > - config.radius &&
								(iStar.y - config.position.y) > - config.radius
							) {
								context.beginPath();
								context.moveTo(iStar.x, iStar.y);
								context.lineTo(jStar.x, jStar.y);
								context.stroke();
								context.closePath();
							}
						}
					}
				}
			}
		};

		this.createStars = function () {
			var length = config.length,
				star,
				i;

			context.clearRect(0, 0, canvas.width, canvas.height);

			for (i = 0; i < length; i++) {
				config.stars.push(new Star());
				star = config.stars[i];

				star.create();
			}

			star.line();
			star.animate();
		};

		this.setCanvas = function () {
			canvas.width = config.width;
			canvas.height = config.height;
		};

		this.setContext = function () {
			context.fillStyle = config.star.color;
			context.strokeStyle = config.line.color;
			context.lineWidth = config.line.width;
		};

		this.setInitialPosition = function () {
			if (!options || !options.hasOwnProperty('position')) {
				config.position = {
					x: canvas.width * 0.5,
					y: canvas.height * 0.5
				};
			}
		};

		this.loop = function (callback) {
			callback();

			this.rAF = window.requestAnimationFrame(function () {
				stats.begin();
				this.loop(callback);
				stats.end();
			}.bind(this));
		};

		this.handlers = {
			window: {
				mousemove: function(e){
					config.position.x = e.pageX - $canvas.offset().left;
					config.position.y = e.pageY - $canvas.offset().top;
				},
				resize: function () {
					window.cancelAnimationFrame(this.rAF);
				}
			}
		};

		this.bind = function () {
			$window
				.on('mousemove', this.handlers.window.mousemove)
				.on('resize', this.handlers.window.resize.bind(this));
		};

		this.unbind = function () {
			$window
				.off('mousemove', this.handlers.window.mousemove)
				.off('resize', this.handlers.window.resize);
		}

		this.init = function () {
			this.setCanvas();
			this.setContext();
			this.setInitialPosition();
			this.loop(this.createStars);
			this.bind();
		};
	}

	function instantiate(element, options) {
		var c = new Constellation(element, options);
		c.init();
	}

	$.fn.constellation = function (options) {
		return this.each(function () {
			$window.on('resize', () => {
				instantiate(this, options);
			});

			instantiate(this, options);
		});
	};
})($, window);

// Init plugin
$('canvas').constellation({
	star: {
		width: 3
	},
	line: {
		color: 'rgba(255, 255, 255, .75)'
	},
	length: (window.innerWidth / 6),
	radius: (window.innerWidth / 10)
});

</script>