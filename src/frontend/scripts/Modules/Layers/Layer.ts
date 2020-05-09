import LayerAnimation from '@modules/Layers/LayerAnimation';
import State from '@tools/State';
import Extractor from '@tools/Extractor';

/**
 * ...
 */
class Layer {
    /**
     * ...
     *
     * @type string
     */
    private readonly key: string;

    /**
     * ...
     *
     * @type PanelAnimation
     */
    private readonly animation: LayerAnimation;

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
        this.animation = new LayerAnimation(element);
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
     * @return boolean
     */
    public isValid(): boolean {
        return this.key !== null;
    }

    /**
     * ...
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
}

export default Layer;
