/**
 * The layer animation.
 */
export default class LayerAnimation {
    /**
     * The DOM element.
     *
     * @type Element
     */
    private element: Element;

    /**
     * The constructor.
     *
     * @param element { Element }
     *   The DOM element.
     */
    public constructor(element: Element) {
        this.element = element;
    }

    /**
     * Shows a layer.
     *
     * @return void
     */
    public show(): void {
        this.element.classList.add('slide-panels__layer_visible');
        this.element.classList.remove('slide-panels__layer_hidden');
    }

    /**
     * Hides a layer.
     *
     * @return void
     */
    public hide(): void {
        this.element.classList.add('slide-panels__layer_hidden');
        this.element.classList.remove('slide-panels__layer_visible');
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
        const suffix = isReverse ? '-reverse' : '';

        this.element.classList.add(`slide-panels__layer_slide-inside${suffix}`);
        this.element.classList.remove('slide-panels__layer_hidden');

        setTimeout(() => {
            this.element.classList.add('slide-panels__layer_visible');
            this.element.classList.remove(`slide-panels__layer_slide-inside${suffix}`);
        }, 300);
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
        const suffix = isReverse ? '-reverse' : '';

        this.element.classList.add(`slide-panels__layer_slide-outside${suffix}`);
        this.element.classList.remove('slide-panels__layer_visible');

        setTimeout(() => {
            this.element.classList.add('slide-panels__layer_hidden');
            this.element.classList.remove(`slide-panels__layer_slide-outside${suffix}`);
        }, 300);
    }
}
