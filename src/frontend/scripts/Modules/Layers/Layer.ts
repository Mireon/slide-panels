import LayerAnimation from '@modules/Layers/LayerAnimation';
import State from '@tools/State';
import Extractor from '@tools/Extractor';

/**
 * The layer.
 */
export default class Layer {
    /**
     * The layer key.
     *
     * @type string
     */
    private readonly key: string;

    /**
     * The layer animation.
     *
     * @type PanelAnimation
     */
    private readonly animation: LayerAnimation;

    /**
     * The layer state.
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
        this.animation = new LayerAnimation(element);
        this.state = new State();
    }

    /**
     * Returns the layer key.
     *
     * @return string
     */
    public getKey(): string {
        return this.key;
    }

    /**
     * Returns the layer state.
     *
     * @return State
     */
    public getState(): State {
        return this.state;
    }

    /**
     * Indicates about validity of layer.
     *
     * @return boolean
     */
    public isValid(): boolean {
        return this.key !== null;
    }

    /**
     * Indicates that one layer belongs to another layer.
     *
     * @param layer { Layer }
     *   A layer.
     *
     * @return boolean
     */
    public isChildOf(layer: Layer): boolean {
        return this.getKey().indexOf(layer.getKey()) === 0;
    }

    /**
     * Shows the layer.
     *
     * @return void
     */
    public show(): void {
        if (this.state.isHidden()) {
            this.animation.show();
            this.state.show();
        }
    }

    /**
     * Hides the layer.
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
     * Inserts the layer to inside.
     *
     * @param isReverse { boolean }
     *   If true, the animation is reversed.
     *
     * @return void
     */
    public inside(isReverse = false): void {
        if (this.state.isHidden()) {
            this.animation.inside(isReverse);
            this.state.show();
        }
    }

    /**
     * Extracts a layer to outside.
     *
     * @param isReverse { boolean }
     *   If true, the animation is reversed.
     *
     * @return void
     */
    public outside(isReverse = false): void {
        if (this.state.isVisible()) {
            this.animation.outside(isReverse);
            this.state.hide();
        }
    }
}
