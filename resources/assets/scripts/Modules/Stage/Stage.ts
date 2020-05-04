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
        this.animation.show();
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
        setTimeout(() => this.panels.hide(), 300);
        setTimeout(() => this.animation.hide(), 300);
    }
}

export default Stage;
