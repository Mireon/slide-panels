/**
 * ...
 */
enum States {
    HIDDEN = 'hidden',
    VISIBLE = 'visible',
}

/**
 * ...
 */
class StageVision {
    /**
     * ...
     *
     * @type HTMLElement
     */
    private element: HTMLElement;

    /**
     * ...
     */
    private state = States.HIDDEN;

    /**
     * The constructor.
     */
    public constructor() {
        this.element = document.getElementById('slide-panels');
    }

    /**
     * ...
     *
     * @return void
     */
    public show(): void {
        if (this.state === States.VISIBLE) { return; }

        this.element.classList.add('slide-panels__stage_visible');
        this.element.classList.remove('slide-panels__stage_hidden');
        this.state = States.VISIBLE;
    }

    /**
     * ...
     *
     * @return void
     */
    public hide(): void {
        if (this.state === States.HIDDEN) { return; }

        this.element.classList.add('slide-panels__stage_hidden');
        this.element.classList.remove('slide-panels__stage_visible');
        this.state = States.HIDDEN;
    }
}

export default StageVision;
