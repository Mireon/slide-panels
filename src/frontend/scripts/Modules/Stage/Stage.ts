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
     * The DOM element.
     *
     * @type Element
     */
    private readonly element: Element;

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
        this.element = Selector.root();
        this.events = new StageEvents(this.element);
        this.animation = new StageAnimation(this.element);
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
            this.events.show();
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
            this.animation.hide();
            this.events.hide();
            this.body.unfreeze();
            this.state.hide();
            this.backstage.hide();
            this.panels.hide();
        }
    }
}
