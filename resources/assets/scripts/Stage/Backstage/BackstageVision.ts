/**
 * ...
 */
class BackstageVision {
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
        this.element = document.getElementById('slide-panels__backstage');
    }

    /**
     * ...
     *
     * @return void
     */
    public show() {
        this.element.classList.add('slide-panels__backstage_visible');
        this.element.classList.remove('slide-panels__backstage_hidden');
    }

    /**
     * ...
     *
     * @return void
     */
    public hide() {
        this.element.classList.add('slide-panels__backstage_hidden');
        this.element.classList.remove('slide-panels__backstage_visible');
    }
}

export default BackstageVision;
