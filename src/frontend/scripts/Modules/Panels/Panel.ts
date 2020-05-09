import Extractor from '@tools/Extractor';
import PanelAnimation from '@modules/Panels/PanelAnimation';
import State from '@tools/State';
import Target from '@entities/Target';
import { C } from '@entities/C';
import Layers from '@modules/Layers/Layers';

/**
 * ...
 */
class Panel {
    /**
     * ...
     *
     * @type string
     */
    private readonly key: string;

    /**
     * ...
     *
     * @type C.side
     */
    private readonly side: C.side;

    /**
     * ...
     *
     * @type Layers
     */
    private readonly layers: Layers;

    /**
     * ...
     *
     * @type PanelAnimation
     */
    private readonly animation: PanelAnimation;

    /**
     * ...
     *
     * @type State
     */
    private readonly state: State;

    /**
     * The constructor.
     *
     * @param element { Element }
     *   ...
     */
    public constructor(element: Element) {
        this.key = Extractor.key(element);
        this.side = Extractor.side(element);
        this.layers = new Layers(this.key);
        this.animation = new PanelAnimation(element);
        this.state = new State();
    }

    /**
     * ...
     *
     * @return string
     */
    public getKey(): string {
        return this.key;
    }

    /**
     * ...
     *
     * @return State
     */
    public getState(): State {
        return this.state;
    }

    /**
     * ...
     *
     * @return C.side
     */
    public getSide(): C.side {
        return this.side;
    }

    /**
     * ...
     *
     * @return boolean
     */
    public isValid(): boolean {
        return this.key !== null && this.side !== null;
    }

    /**
     * ...
     *
     * @param target { Target }
     *   ...
     * @param withAnimation { boolean }
     *   ...
     *
     * @return void
     */
    public show(target: Target, withAnimation = false): void {
        if (this.state.isHidden()) {
            this.animation.show();
            this.state.show();
        }

        if (target.hasLayers()) {
            this.layers.show(target, withAnimation);
        }
    }

    /**
     * ...
     *
     * @return void
     */
    public hide(): void {
        if (this.state.isVisible()) {
            this.animation.hide();
            this.state.hide();
        }
    }

    /**
     * ...
     *
     * @param target { Target }
     *   ...
     *
     * @return void
     */
    public inside(target: Target): void {
        if (this.state.isHidden()) {
            this.animation.inside();
            this.state.show();
        }

        if (target.hasLayers()) {
            this.layers.show(target);
        }
    }

    /**
     * ...
     *
     * @return void
     */
    public outside(): void {
        if (this.state.isVisible()) {
            this.animation.outside();
            this.state.hide();
        }
    }
}

export default Panel;
