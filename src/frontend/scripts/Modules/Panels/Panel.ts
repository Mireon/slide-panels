import Extractor from '@tools/Extractor';
import PanelAnimation from '@modules/Panels/PanelAnimation';
import State from '@tools/State';
import Target from '@entities/Target';
import { C } from '@entities/C';
import Layers from '@modules/Layers/Layers';

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
     * @type C.side
     */
    private readonly side: C.side;

    /**
     * The panel layers.
     *
     * @type Layers
     */
    private readonly layers: Layers;

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
     * The constructor.
     *
     * @param element { Element }
     *   The DOM element.
     */
    public constructor(element: Element) {
        this.key = Extractor.key(element);
        this.side = Extractor.side(element);
        this.layers = new Layers(this.key);
        this.animation = new PanelAnimation(element);
        this.state = new State();
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
     * @return C.side
     */
    public getSide(): C.side {
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
     * Shows the panel and its layers.
     *
     * @param target { Target }
     *   A target.
     *
     * @return void
     */
    public show(target: Target): void {
        if (this.state.isHidden()) {
            this.layers.show(target);
            this.animation.show();
            this.state.show();
        } else {
            this.layers.inside(target);
        }
    }

    /**
     * Hides the panel and its layers.
     *
     * @return void
     */
    public hide(): void {
        if (this.state.isVisible()) {
            this.animation.hide();
            this.state.hide();

            setTimeout(() => this.layers.hide(), 300);
        }
    }

    /**
     * Inserts the panel to inside.
     *
     * @param target { Target }
     *   A target.
     *
     * @return void
     */
    public inside(target: Target): void {
        if (this.state.isHidden()) {
            this.layers.show(target);
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
            this.animation.outside();
            this.state.hide();

            setTimeout(() => this.layers.hide(), 300);
        }
    }
}
