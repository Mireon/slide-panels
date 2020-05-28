import Selector from '@tools/Selector';

/**
 * The stage animation.
 */
export default class StageAnimation {
    /**
     * The DOM element.
     *
     * @type Element
     */
    private readonly element: Element;

    /**
     * The constructor.
     */
    public constructor() {
        this.element = Selector.root();
    }

    /**
     * Shows the stage.
     *
     * @return void
     */
    public show(): void {
        this.element.classList.add('slide-panels__stage_showing');
        this.element.classList.remove('slide-panels__stage_hidden');

        setTimeout(() => {
            this.element.classList.add('slide-panels__stage_visible');
            this.element.classList.remove('slide-panels__stage_showing');
        }, 300);
    }

    /**
     * Hide the stage.
     *
     * @return void
     */
    public hide(): void {
        this.element.classList.add('slide-panels__stage_hiding');
        this.element.classList.remove('slide-panels__stage_visible');

        setTimeout(() => {
            this.element.classList.add('slide-panels__stage_hidden');
            this.element.classList.remove('slide-panels__stage_hiding');
        }, 300);
    }
}
