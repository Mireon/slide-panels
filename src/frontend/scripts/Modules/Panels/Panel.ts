import Extractor from '@tools/Extractor';
import PanelAnimation from '@modules/Panels/PanelAnimation';
import State from '@tools/State';
import { Props } from '@tools/Props';
import PanelEvents from '@modules/Panels/PanelEvents';

/**
 * The panel.
 */
export default class Panel {
    /**
     * The panel key.
     *
     * @type string
     */
    private readonly key: string;

    /**
     * The panel side.
     *
     * @type Props.side
     */
    private readonly side: Props.side;

    /**
     * The panel animation.
     *
     * @type PanelAnimation
     */
    private readonly animation: PanelAnimation;

    /**
     * The panel state.
     *
     * @type State
     */
    private readonly state: State;

    /**
     * The panel events.
     *
     * @type PanelEvents
     */
    private readonly events: PanelEvents;

    /**
     * The constructor.
     *
     * @param element { Element }
     *   The DOM element.
     */
    public constructor(element: Element) {
        this.key = Extractor.key(element);
        this.side = Extractor.side(element);
        this.animation = new PanelAnimation(element, this);
        this.state = new State();
        this.events = new PanelEvents(element, this);
    }

    /**
     * Returns the panel key.
     *
     * @return string
     */
    public getKey(): string {
        return this.key;
    }

    /**
     * Returns the panel state.
     *
     * @return State
     */
    public getState(): State {
        return this.state;
    }

    /**
     * Returns the panel side.
     *
     * @return Props.side
     */
    public getSide(): Props.side {
        return this.side;
    }

    /**
     * Indicates about validity of the panel.
     *
     * @return boolean
     */
    public isValid(): boolean {
        return this.key !== null && this.side !== null;
    }

    /**
     * Inserts the panel to inside.
     *
     * @return void
     */
    public inside(): void {
        if (this.state.isHidden()) {
            this.events.show();
            this.animation.inside();
            this.state.show();
        }
    }

    /**
     * Retrieves the panel to outside.
     *
     * @return void
     */
    public outside(): void {
        if (this.state.isVisible()) {
            this.events.hide();
            this.animation.outside();
            this.state.hide();
        }
    }
}
