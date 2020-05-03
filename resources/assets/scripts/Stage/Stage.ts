import StageAnimation from './StageAnimation';
import Backstage from './Backstage/Backstage';
import Sides from './Sides/Sides';
import Panels from './Panels/Panels';
import Target from '@scripts/Utilities/Target';

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

        this.animation.show();
        this.backstage.show();
        this.panels.show(target);
        this.sides.show(target.getSide());
    }

    /**
     * ...
     *
     * @return void
     */
    public hide(): void {
        this.sides.hide();
        this.panels.hide();
        this.backstage.hide();
        this.animation.hide();
    }
}

export default Stage;
