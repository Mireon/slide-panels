import Side from '@modules/Sides/Side';
import { C } from '@entities/C';
import Target from '@entities/Target';
import Selector from '@tools/Selector';

/**
 * The set of sides.
 */
export default class Sides {
    /**
     * The left side.
     *
     * @type Side
     */
    private readonly left: Side;

    /**
     * The right side.
     *
     * @type Side
     */
    private readonly right: Side;

    /**
     * The constructor.
     */
    public constructor() {
        if (Selector.side(C.side.LEFT)) {
            this.left = new Side(C.side.LEFT);
        }
        if (Selector.side(C.side.LEFT)) {
            this.right = new Side(C.side.RIGHT);
        }
    }

    /**
     * Shows the side.
     *
     * @param target { Target }
     *   A target.
     *
     * @return void
     */
    public show(target: Target): void {
        switch (target.getSide()) {
            case C.side.LEFT:
                this.showLeft();
                this.hideRight();
                break;
            case C.side.RIGHT:
                this.showRight();
                this.hideLeft();
                break;
        }
    }

    /**
     * Shows the left side.
     *
     * @return void
     */
    public showLeft(): void {
        if (this.left) {
            this.left.inside();
        }
    }

    /**
     * Shows the right side.
     *
     * @return void
     */
    public showRight(): void {
        if (this.right) {
            this.right.inside();
        }
    }

    /**
     * Hides all sides.
     *
     * @return void
     */
    public hide(): void {
        this.hideLeft();
        this.hideRight();
    }

    /**
     * Hides the left side.
     *
     * @return void
     */
    public hideLeft(): void {
        if (this.left) {
            this.left.outside();
        }
    }

    /**
     * Hides the right side.
     *
     * @return void
     */
    public hideRight(): void {
        if (this.right) {
            this.right.outside();
        }
    }
}
