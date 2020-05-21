import Lever from '@modules/Levers/Lever';
import LeverClickListener from '@modules/Levers/LeverClickListener';
import Selector from '@tools/Selector';

/**
 * The set of levers.
 */
export default class Levers {
    /**
     * The list of levers these for show.
     *
     * @type Array<Lever>
     */
    private readonly toShowLevers = new Array<Lever>();

    /**
     * The list of levers these for hide.
     *
     * @type Array<Lever>
     */
    private readonly toHideLevers = new Array<Lever>();

    /**
     * The constructor.
     */
    public constructor() {
        Selector.levers().forEach((element: Element) => {
            const lever = new Lever(element);

            if (lever.toShow()) {
                this.toShowLevers.push(lever);
            } else if (lever.toHide()) {
                this.toHideLevers.push(lever);
            }
        });
    }

    /**
     * Sets the click listener on levers these for show.
     *
     * @param listener { LeverClickListener }
     *   A click listener to lever.
     *
     * @return void
     */
    public setToShowClickListener(listener: LeverClickListener): void {
        this.toShowLevers.forEach((lever: Lever) => lever.setClickListener(listener));
    }

    /**
     * Sets the click listener on levers these for hide.
     *
     * @param listener { LeverClickListener }
     *   A click listener to lever.
     *
     * @return void
     */
    public setToHideClickListener(listener: LeverClickListener): void {
        this.toHideLevers.forEach((lever: Lever) => lever.setClickListener(listener));
    }
}
