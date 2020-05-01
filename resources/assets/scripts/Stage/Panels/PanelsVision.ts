/**
 * ...
 */
class PanelsVision {
    /**
     * ...
     *
     * @type HTMLElement
     */
    private element: HTMLElement;

    /**
     * The constructor.
     */
    constructor() {
        this.element = document.getElementById('slide-panels__panels');
    }

    /**
     * ...
     *
     * @return void
     */
    public show() {
        this.element.classList.add('slide-panels__panels_visible');
        this.element.classList.remove('slide-panels__panels_hidden');
    }

    /**
     * ...
     *
     * @return void
     */
    public hide() {
        this.element.classList.add('slide-panels__panels_hidden');
        this.element.classList.remove('slide-panels__panels_visible');
    }
}

export default PanelsVision;
