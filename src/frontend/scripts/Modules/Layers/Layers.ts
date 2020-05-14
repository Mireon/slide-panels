import Selector from '@tools/Selector';
import Target from '@entities/Target';
import Layer from '@modules/Layers/Layer';

/**
 * ...
 */
class Layers {
    /**
     * ...
     *
     * @type Map
     */
    private readonly layers = new Map();

    /**
     * The constructor.
     *
     * @param panelKey { string }
     *   ...
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
     * ...
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
     * ...
     *
     * @param target { Target }
     *   ...
     *
     * @return void
     */
    public show(target: Target): void {
        if (!target.hasLayers()) { return; }

        this.hide();
        this.layers.get(target.getLayerKey()).show();
    }

    /**
     * ...
     *
     * @return void
     */
    public hide(): void {
        this.layers.forEach((layer: Layer) => {
            layer.hide();
        });
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

        const isReverse = current.getKey().indexOf(selected.getKey()) === 0;

        current.outside(isReverse);
        selected.inside(isReverse);

        console.clear();
        console.log('CURRENT: ', current.getKey());
        console.log('SELECT: ', selected.getKey());
    }
}

export default Layers;
