/**
 * The body.
 */
export default class BodyAnimation {
    /**
     * The DOM element.
     *
     * @type Element
     */
    private readonly element: Element;

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
     * Freezes the body.
     *
     * @return void
     */
    public freeze(): void
    {
        this.element.classList.add('slide-panels__body_freeze');
    }

    /**
     * Unfreezes the body.
     *
     * @return void
     */
    public unfreeze(): void
    {
        this.element.classList.remove('slide-panels__body_freeze');
    }
}
