/**
 * ...
 */
class PanelAnimation {
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
        this.element.classList.add('slide-panels__panel_visible');
        this.element.classList.remove('slide-panels__panel_hidden');
    }

    /**
     * ...
     *
     * @return void
     */
    public hide(): void {
        this.element.classList.add('slide-panels__panel_hidden');
        this.element.classList.remove('slide-panels__panel_visible');
    }

    /**
     * ...
     *
     * @return void
     */
    public inside(): void {
        this.element.classList.add('slide-panels__panel_slide-inside');
        this.element.classList.remove('slide-panels__panel_hidden');

        setTimeout(() => {
            this.element.classList.add('slide-panels__panel_visible');
            this.element.classList.remove('slide-panels__panel_slide-inside');
        }, 300);
    }

    /**
     * ...
     *
     * @return void
     */
    public outside(): void {
        this.element.classList.add('slide-panels__panel_slide-outside');
        this.element.classList.remove('slide-panels__panel_visible');

        setTimeout(() => {
            this.element.classList.add('slide-panels__panel_hidden');
            this.element.classList.remove('slide-panels__panel_slide-outside');
        }, 300);
    }
}

export default PanelAnimation;
