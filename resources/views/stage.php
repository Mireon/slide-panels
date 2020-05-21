<div id="slide-panels" class="slide-panels slide-panels__stage slide-panels__stage_hidden">
    <div data-element="backstage" class="slide-panels__backstage slide-panels__backstage_hidden"></div>
    <div data-element="lever" data-action="hide" class="slide-panels__close-empty-space"></div>
    <div data-element="side" data-side="left" class="slide-panels__side slide-panels__side_hidden slide-panels__side-left_outside">
        <div data-element="lever" data-action="hide" class="slide-panels__close-label slide-panels__close-label_left slide-panels__close-label_hidden"><i></i></div>
        <div data-element="panel" data-key="p1" data-side="left" class="slide-panels__panel slide-panels__panel_hidden">
            <div class="header header_big">
                <div class="header__text header__text_big">Panel 1</div>
            </div>
            <div data-element="layer" data-key="l1" class="slide-panels__layer slide-panels__layer_hidden">
                <div class="header header_small">
                    <div class="header__text header__text_small">Panel 1 > Layer 1</div>
                </div>
                <div data-element="lever" data-action="back" class="back">
                    <i class="back__icon fa fa-chevron-left"></i>
                    <span class="back__text">Back</span>
                </div>
                <?php include 'menu_panel-1.php'; ?>
            </div>
            <div data-element="layer" data-key="l1.l1" class="slide-panels__layer slide-panels__layer_hidden">
                <div class="header header_small">
                    <div class="header__text header__text_small">Panel 1 > Layer 1 > Layer 1</div>
                </div>
                <div data-element="lever" data-action="back" class="back">
                    <i class="back__icon fa fa-chevron-left"></i>
                    <span class="back__text">Back</span>
                </div>
                <?php include 'menu_panel-1.php'; ?>
            </div>
            <div data-element="layer" data-key="l1.l1.l1" class="slide-panels__layer slide-panels__layer_hidden">
                <div class="header header_small">
                    <div class="header__text header__text_small">Panel 1 > Layer 1 > Layer 1 > Layer 1</div>
                </div>
                <div data-element="lever" data-action="back" class="back">
                    <i class="back__icon fa fa-chevron-left"></i>
                    <span class="back__text">Back</span>
                </div>
                <?php include 'menu_panel-1.php'; ?>
            </div>
            <div data-element="layer" data-key="l1.l1.l2" class="slide-panels__layer slide-panels__layer_hidden">
                <div class="header header_small">
                    <div class="header__text header__text_small">Panel 1 > Layer 1 > Layer 1 > Layer 2</div>
                </div>
                <?php include 'menu_panel-1.php'; ?>
            </div>
            <div data-element="layer" data-key="l1.l2" class="slide-panels__layer slide-panels__layer_hidden">
                <div class="header header_small">
                    <div class="header__text header__text_small">Panel 1 > Layer 1 > Layer 2</div>
                </div>
                <?php include 'menu_panel-1.php'; ?>
            </div>
            <div data-element="layer" data-key="l2" class="slide-panels__layer slide-panels__layer_hidden">
                <div class="header header_small">
                    <div class="header__text header__text_small">Panel 1 > Layer 2</div>
                </div>
                <?php include 'menu_panel-1.php'; ?>
            </div>
            <div data-element="layer" data-key="l2.l1" class="slide-panels__layer slide-panels__layer_hidden">
                <div class="header header_small">
                    <div class="header__text header__text_small">Panel 1 > Layer 2 > Layer 1</div>
                </div>
                <?php include 'menu_panel-1.php'; ?>
            </div>
            <div data-element="layer" data-key="l2.l2" class="slide-panels__layer slide-panels__layer_hidden">
                <div class="header header_small">
                    <div class="header__text header__text_small">Panel 1 > Layer 2 > Layer 2</div>
                </div>
                <?php include 'menu_panel-1.php'; ?>
            </div>
        </div>
    </div>
    <div data-element="side" data-side="right" class="slide-panels__side slide-panels__side_hidden slide-panels__side-right_outside">
        <div data-element="lever" data-action="hide" class="slide-panels__close-label slide-panels__close-label_right slide-panels__close-label_hidden"><i></i></div>
        <div data-element="panel" data-key="p2" data-side="right" class="slide-panels__panel slide-panels__panel_hidden">
            <div class="header header_big">
                <div class="header__text header__text_big">Panel 2</div>
            </div>
        </div>
    </div>
</div>
