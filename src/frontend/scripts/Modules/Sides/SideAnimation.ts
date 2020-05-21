import Selector from '@tools/Selector';
import { C } from '@entities/C';

/**
 * The side animation.
 */
export default class SideAnimation {
    /**
     * The side.
     *
     * @type C.side
     */
    private readonly side: C.side;

    /**
     * The DOM element.
     *
     * @type Element
     */
    private readonly element: Element;

    /**
     * The DOM element of a side button close.
     *
     * @type Element
     */
    private readonly buttonClose: Element;

    /**
     * The constructor.
     *
     * @param side { C.side }
     *   A side.
     */
    public constructor(side: C.side) {
        this.side = side;
        this.element = Selector.side(side);
        this.buttonClose = Selector.sideButtonClose(side);
    }

    /**
     * Inserts a side to inside.
     *
     * @return void
     */
    public inside(): void {
        this.element.classList.add(`slide-panels__side-${this.side}_slide-inside`);
        this.element.classList.remove(`slide-panels__side-${this.side}_outside`);
        this.element.classList.add('slide-panels__side_visible');
        this.element.classList.remove('slide-panels__side_hidden');

        setTimeout(() => this.showButtonClose(), 50);
        setTimeout(() => {
            this.element.classList.add(`slide-panels__side-${this.side}_inside`);
            this.element.classList.remove(`slide-panels__side-${this.side}_slide-inside`);
        }, 300);
    }

    /**
     * Retrieves a side to outside.
     *
     * @return void
     */
    public outside(): void {
        this.element.classList.add(`slide-panels__side-${this.side}_slide-outside`);
        this.element.classList.remove(`slide-panels__side-${this.side}_inside`);

        setTimeout(() => this.hideButtonClose(), 150);
        setTimeout(() => {
            this.element.classList.add(`slide-panels__side-${this.side}_outside`);
            this.element.classList.remove(`slide-panels__side-${this.side}_slide-outside`);
            this.element.classList.add('slide-panels__side_hidden');
            this.element.classList.remove('slide-panels__side_visible');
        }, 300);
    }

    /**
     * Shows a side button close.
     *
     * @return void
     */
    private showButtonClose(): void {
        if (this.buttonClose) {
            this.buttonClose.classList.add('slide-panels__close-label_visible');
            this.buttonClose.classList.remove('slide-panels__close-label_hidden');
        }
    }

    /**
     * Hides a side button close.
     *
     * @return void
     */
    private hideButtonClose(): void {
        if (this.buttonClose) {
            this.buttonClose.classList.add('slide-panels__close-label_hidden');
            this.buttonClose.classList.remove('slide-panels__close-label_visible');
        }
    }
}
