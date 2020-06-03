import Selector from '@tools/Selector';
import Panel from '@modules/Panels/Panel';
import Target from '@tools/Target';

/**
 * The set of panels.
 */
export default class Panels {
    /**
     * The list of panels.
     *
     * @type Map
     */
    private panels = new Map();

    /**
     * The constructor.
     */
    public constructor() {
        Selector.panels().forEach((element: Element) => {
            const panel = new Panel(element);

            if (panel.isValid()) {
                this.panels.set(panel.getKey(), panel);
            }
        });
    }

    /**
     * Returns the current panel.
     *
     * @return Panel
     */
    public getCurrentPanel(): Panel {
        let result: Panel = null;

        this.panels.forEach((panel: Panel) => {
            if (panel.getState().isVisible()) {
                result = this.panels.get(panel.getKey());
            }
        });

        return result;
    }

    /**
     * Shows the panel.
     *
     * @param target { Target }
     *   A target.
     *
     * @return void
     */
    public show(target: Target): void {
        const current: Panel = this.getCurrentPanel();
        const selected: Panel = this.panels.get(target.getPanelKey());

        if (!current) {
            selected.inside(target);
            return;
        }

        if (selected === current) {
            current.showLayer(target);
        } else {
            current.outside();
            selected.inside(target);
        }
    }

    /**
     * Hides the panel.
     *
     * @return void
     */
    public hide(): void {
        this.panels.forEach((panel: Panel) => panel.outside());
    }
}
