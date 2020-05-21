/**
 * The panel animation.
 */
export default class PanelAnimation {
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
     * Shows a panel.
     *
     * @return void
     */
    public show(): void {
        this.element.classList.add('slide-panels__panel_showing');
        this.element.classList.remove('slide-panels__panel_hidden');

        setTimeout(() => {
            this.element.classList.add('slide-panels__panel_visible');
            this.element.classList.remove('slide-panels__panel_showing');
        }, 300);
    }

    /**
     * Hides a panel.
     *
     * @return void
     */
    public hide(): void {
        this.element.classList.add('slide-panels__panel_hiding');
        this.element.classList.remove('slide-panels__panel_visible');

        setTimeout(() => {
            this.element.classList.add('slide-panels__panel_hidden');
            this.element.classList.remove('slide-panels__panel_hiding');
        }, 300);
    }

    /**
     * Inserts a panel to inside.
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
     * Retrieves a panel to outside.
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
