import StageAnimation from '@modules/Stage/StageAnimation';
import Visibility from '@states/Visibility';
import Backstage from '@modules/Backstage/Backstage';
import Sides from '@modules/Sides/Sides';
import Panels from '@modules/Panels/Panels';
import Target from '@entities/Target';

/**
 * ...
 */
class Stage {
    /**
     * ...
     *
     * @type StageAnimation
     */
    private animation: StageAnimation;

    /**
     * ...
     *
     * @type Visibility
     */
    private state: Visibility;

    /**
     * ...
     *
     * @type Backstage
     */
    private backstage: Backstage;

    /**
     * ...
     *
     * @type Sides
     */
    private sides: Sides;

    /**
     * ...
     *
     * @type Panels
     */
    private panels: Panels;

    /**
     * The constructor.
     */
    public constructor() {
        this.animation = new StageAnimation();
        this.state = new Visibility();
        this.backstage = new Backstage();
        this.sides = new Sides();
        this.panels = new Panels();
    }

    /**
     * ...
     *
     * @param target { Target }
     *   ...
     *
     * @return void
     */
    public show(target: Target): void {
        if (!this.panels.hasPanel(target.getPanel())) { return; }

        if (this.state.isHidden()) {
            this.animation.show();
            this.state.setVisible();
        }

        this.backstage.show();
        this.panels.show(target);
        this.sides.inside(target.getSide());
    }

    /**
     * ...
     *
     * @return void
     */
    public hide(): void {
        this.sides.outside();
        this.backstage.hide();
        this.panels.hide();

        if (this.state.isVisible()) {
            this.animation.hide();
            this.state.setHidden();
        }
    }
}

export default Stage;
