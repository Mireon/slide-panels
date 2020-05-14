import Selector from '@tools/Selector';

/**
 * ...
 */
class BackstageAnimation {
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
        this.element = Selector.backstage();
    }

    /**
     * ...
     *
     * @return void
     */
    public show() {
        this.element.classList.add('slide-panels__backstage_showing');
        this.element.classList.remove('slide-panels__backstage_hidden');

        setTimeout(() => {
            this.element.classList.add('slide-panels__backstage_visible');
            this.element.classList.remove('slide-panels__backstage_showing');
        }, 300);
    }

    /**
     * ...
     *
     * @return void
     */
    public hide() {
        this.element.classList.add('slide-panels__backstage_hiding');
        this.element.classList.remove('slide-panels__backstage_visible');

        setTimeout(() => {
            this.element.classList.add('slide-panels__backstage_hidden');
            this.element.classList.remove('slide-panels__backstage_hiding');
        }, 300);
    }
}

export default BackstageAnimation;
