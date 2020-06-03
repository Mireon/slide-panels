import StageAnimation from '@modules/Stage/StageAnimation';
import State from '@tools/State';
import Backstage from '@modules/Backstage/Backstage';
import Panels from '@modules/Panels/Panels';
import Target from '@tools/Target';

/**
 * The stage.
 */
export default class Stage {
    /**
     * The stage animation.
     *
     * @type StageAnimation
     */
    private readonly animation: StageAnimation;

    /**
     * The stage state.
     *
     * @type State
     */
    private readonly state: State;

    /**
     * The backstage.
     *
     * @type Backstage
     */
    private readonly backstage: Backstage;

    /**
     * The set of panels.
     *
     * @type Panels
     */
    private readonly panels: Panels;

    /**
     * The constructor.
     */
    public constructor() {
        this.animation = new StageAnimation();
        this.state = new State();
        this.backstage = new Backstage();
        this.panels = new Panels();
    }

    /**
     * Shows the stage and its elements.
     *
     * @param target { Target }
     *   A target.
     *
     * @return void
     */
    public show(target: Target): void {
        if (this.state.isHidden()) {
            this.animation.show();
            this.state.show();
            this.backstage.show();
        }

        this.panels.show(target);
    }

    /**
     * Hides the stage and its elements.
     *
     * @return void
     */
    public hide(): void {
        if (this.state.isVisible()) {
            this.backstage.hide();
            this.panels.hide();
            this.animation.hide();
            this.state.hide();
        }
    }
}
