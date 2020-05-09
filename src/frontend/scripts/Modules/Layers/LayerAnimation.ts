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
}

export default LayerAnimation;
