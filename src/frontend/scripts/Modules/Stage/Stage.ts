import StageAnimation from '@modules/Stage/StageAnimation';
import State from '@tools/State';
import Backstage from '@modules/Backstage/Backstage';
import Panels from '@modules/Panels/Panels';
import Target from '@tools/Target';
import Selector from '@tools/Selector';
import StageEvents from '@modules/Stage/StageEvents';
import Body from '@modules/Body/Body';

/**
 * The stage.
 */
export default class Stage {
    /**
     * The stage events.
     *
     * @type StageEvents
     */
    private readonly events: StageEvents;

    /**
     * The stage animation.
     *
     * @type StageAnimation
     */
    private readonly animation: StageAnimation;

    /**
     * The body.
     *
     * @type State
     */
    private readonly body: Body;

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
        this.events = new StageEvents(Selector.root());
        this.animation = new StageAnimation();
        this.body = new Body();
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
            this.body.freeze();
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
            this.body.unfreeze();
        }
    }
}
