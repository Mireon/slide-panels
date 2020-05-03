import Lever from '@modules/Levers/Lever';
import LeverClickListener from '@modules/Levers/LeverClickListener';
import Selector from '@tools/Selector';
import { C } from '@entities/C';

/**
 * ...
 */
class Levers {
    /**
     * ...
     *
     * @type Array<Lever>
     */
    private toShowLevers = new Array<Lever>();

    /**
     * ...
     *
     * @type Array<Lever>
     */
    private toHideLevers = new Array<Lever>();

    /**
     * The constructor.
     */
    public constructor() {
        this.initLevers();
    }

    /**
     * ...
     *
     * @return void
     */
    private initLevers(): void {
        Selector.element('lever').local(C.location.EVERYWHERE).each((element: Element) => {
            const lever = new Lever(element);

            if (lever.toShow()) {
                this.toShowLevers.push(lever);
            } else if (lever.toHide()) {
                this.toHideLevers.push(lever);
            }
        });
    }

    /**
     * ...
     *
     * @param listener { LeverClickListener }
     *   ...
     *
     * @return void
     */
    public setToShowClickListener(listener: LeverClickListener): void {
        this.toShowLevers.forEach((lever: Lever) => lever.setClickListener(listener));
    }

    /**
     * ...
     *
     * @param listener { LeverClickListener }
     *   ...
     *
     * @return void
     */
    public setToHideClickListener(listener: LeverClickListener): void {
        this.toHideLevers.forEach((lever: Lever) => lever.setClickListener(listener));
    }
}

export default Levers;
