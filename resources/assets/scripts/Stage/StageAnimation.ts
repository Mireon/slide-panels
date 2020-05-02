import Selector from '@scripts/Utilities/Selector';

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
class StageAnimation {
    /**
     * ...
     *
     * @type Element
     */
    private element: Element;

    /**
     * ...
     */
    private state = States.HIDDEN;

    /**
     * The constructor.
     */
    public constructor() {
        this.element = Selector.root().get();
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

export default StageAnimation;
