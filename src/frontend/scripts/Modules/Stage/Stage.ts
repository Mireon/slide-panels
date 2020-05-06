import StageAnimation from '@modules/Stage/StageAnimation';
import State from '@tools/State';
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
     * @type State
     */
    private state: State;

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
        this.state = new State();
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
        this.panels.hide();
        this.animation.hide();
    }
}

export default Stage;
