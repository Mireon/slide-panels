import Selector from '@tools/Selector';
import Target from '@tools/Target';
import Layer from '@modules/Layers/Layer';

/**
 * The set of layers.
 */
export default class Layers {
    /**
     * The list of layers.
     *
     * @type Map
     */
    private readonly layers = new Map();

    /**
     * The constructor.
     *
     * @param panelKey { string }
     *   A panel key.
     */
    public constructor(panelKey: string) {
        Selector.layers(panelKey).forEach((element: Element) => {
            const layer = new Layer(element);

            if (layer.isValid()) {
                this.layers.set(layer.getKey(), layer);
            }
        });
    }

    /**
     * Returns the current layer.
     *
     * @return Layer
     */
    public getCurrentLayer(): Layer {
        let result: Layer = null;

        this.layers.forEach((layer: Layer) => {
            if (layer.getState().isVisible()) {
                result = this.layers.get(layer.getKey());
            }
        });

        return result;
    }

    /**
     * Shows a layer.
     *
     * @param target { Target }
     *   A target.
     *
     * @return void
     */
    public show(target: Target): void {
        if (!target.hasLayers()) { return; }

        this.hide();
        this.layers.get(target.getLayerKey()).show();
    }

    /**
     * Hides all layers.
     *
     * @return void
     */
    public hide(): void {
        this.layers.forEach((layer: Layer) => layer.hide());
    }

    /**
     * Inserts a layer to inside.
     *
     * @param target { Target }
     *   A target.
     *
     * @return void
     */
    public inside(target: Target): void {
        const current = this.getCurrentLayer();
        const selected: Layer = this.layers.get(target.getLayerKey());

        // The selected layer isn't exists.
        // The current layer is hiding.
        if (!selected) {
            current.outside(true);
            return;
        }

        // The selected layer is the current layer.
        // Not actions required.
        if (selected === current) {
            return;
        }

        const isReverse = current.isChildOf(selected);

        // Normal actions.
        current.outside(isReverse);
        selected.inside(isReverse);
    }
}
