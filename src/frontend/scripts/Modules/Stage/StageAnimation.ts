import Selector from '@tools/Selector';

/**
 * ...
 */
class StageAnimation {
    /**
     * The DOM element.
     *
     * @type Element
     */
    private element: Element;


    /**
     * The constructor.
     */
    public constructor() {
        this.element = Selector.root();
    }

    /**
     * ...
     *
     * @return void
     */
    public show(): void {
        this.element.classList.add('slide-panels__stage_visible');
        this.element.classList.remove('slide-panels__stage_hidden');
    }

    /**
     * ...
     *
     * @return void
     */
    public hide(): void {
        setTimeout(() => {
            this.element.classList.add('slide-panels__stage_hidden');
            this.element.classList.remove('slide-panels__stage_visible');
        }, 300);
    }
}

export default StageAnimation;
