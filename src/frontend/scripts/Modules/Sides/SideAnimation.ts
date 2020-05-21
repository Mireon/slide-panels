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
     * The constructor.
     *
     * @param side { C.side }
     *   A side.
     */
    public constructor(side: C.side) {
        this.side = side;
        this.element = Selector.side(side);
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

        setTimeout(() => {
            this.element.classList.add(`slide-panels__side-${this.side}_outside`);
            this.element.classList.remove(`slide-panels__side-${this.side}_slide-outside`);
            this.element.classList.add('slide-panels__side_hidden');
            this.element.classList.remove('slide-panels__side_visible');
        }, 300);
    }
}
