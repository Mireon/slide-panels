/**
 * ...
 */
class LayerAnimation {
    /**
     * ...
     *
     * @type Element
     */
    private element: Element;

    /**
     * The constructor.
     *
     * @param element { Element }
     *   ...
     */
    public constructor(element: Element) {
        this.element = element;
    }

    /**
     * ...
     *
     * @return void
     */
    public show(): void {
        this.element.classList.add('slide-panels__layer_visible');
        this.element.classList.remove('slide-panels__layer_hidden');
    }

    /**
     * ...
     *
     * @return void
     */
    public hide(): void {
        this.element.classList.add('slide-panels__layer_hidden');
        this.element.classList.remove('slide-panels__layer_visible');
    }

    /**
     * ...
     *
     * @param isReverse { boolean }
     *   ...
     *
     * @return void
     */
    public inside(isReverse = false): void {
        const prefix = isReverse ? '-reverse' : '';

        this.element.classList.add(`slide-panels__layer_slide-inside${prefix}`);
        this.element.classList.remove('slide-panels__layer_hidden');

        setTimeout(() => {
            this.element.classList.add('slide-panels__layer_visible');
            this.element.classList.remove(`slide-panels__layer_slide-inside${prefix}`);
        }, 300);
    }

    /**
     * ...
     *
     * @param isReverse { boolean }
     *   ...
     *
     * @return void
     */
    public outside(isReverse = false): void {
        const prefix = isReverse ? '-reverse' : '';

        this.element.classList.add(`slide-panels__layer_slide-outside${prefix}`);
        this.element.classList.remove('slide-panels__layer_visible');

        setTimeout(() => {
            this.element.classList.add('slide-panels__layer_hidden');
            this.element.classList.remove(`slide-panels__layer_slide-outside${prefix}`);
        }, 300);
    }
}

export default LayerAnimation;
