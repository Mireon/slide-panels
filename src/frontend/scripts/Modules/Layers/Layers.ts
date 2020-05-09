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
     * @param target { Target }
     *   ...
     * @param withAnimation { boolean }
     *   ...
     *
     * @return void
     */
    public show(target: Target, withAnimation = false): void {
        console.log('withAnimation: ', withAnimation);
        console.log('target: ', target);
        console.log('keychain: ', target.getLayerKeychain().join('.'));

        this.hide();
        this.layers.get(target.getLayerKeychain().join('.')).show();
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
}

export default Layers;
